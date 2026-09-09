<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class KasirController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        $kategoris = Kategori::all();
        return view('kasir', compact('barangs', 'kategoris'));
    }

    // HALAMAN RIWAYAT TRANSAKSI
   public function riwayat()
{
    // Mengambil data transaksi diurutkan dari yang paling baru
    $riwayats = Penjualan::orderBy('id_penjualan', 'desc')->get();

    return view('riwayat', compact('riwayats'));
}

    // SIMPAN TRANSAKSI
    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required',
            'total'             => 'required|numeric',
            'items'             => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $kodeNota = 'TRX-' . date('YmdHis') . '-' . rand(100, 999);
            $penjualan = new Penjualan();

            // 1. AMBIL USER ID
            $userId = Auth::id();
            if (!$userId) {
                $firstUser = DB::table('users')->first();
                if ($firstUser) {
                    $userId = $firstUser->id ?? $firstUser->id_user ?? 1;
                } else {
                    $userId = DB::table('users')->insertGetId([
                        'username' => 'kasir',
                        'nama'     => 'Kasir Utama',
                        'password' => bcrypt('12345678')
                    ]);
                }
            }

            if (Schema::hasColumn('penjualans', 'user_id')) {
                $penjualan->user_id = $userId;
            } elseif (Schema::hasColumn('penjualans', 'id_user')) {
                $penjualan->id_user = $userId;
            }

            // 2. SET TANGGAL
            $now = Carbon::now();
            if (Schema::hasColumn('penjualans', 'tanggal')) {
                $penjualan->tanggal = $now->toDateString();
            } elseif (Schema::hasColumn('penjualans', 'tgl_penjualan')) {
                $penjualan->tgl_penjualan = $now->toDateString();
            }

            // 3. SET NO FAKTUR / NOTA
            if (Schema::hasColumn('penjualans', 'no_faktur')) {
                $penjualan->no_faktur = $kodeNota;
            } elseif (Schema::hasColumn('penjualans', 'kode_transaksi')) {
                $penjualan->kode_transaksi = $kodeNota;
            }

            // 4. SET TOTAL HARGA
            if (Schema::hasColumn('penjualans', 'total_bayar')) {
                $penjualan->total_bayar = $request->total;
            } elseif (Schema::hasColumn('penjualans', 'total')) {
                $penjualan->total = $request->total;
            }

            // 5. SET UANG BAYAR & KEMBALI
            $nominalBayar = $request->bayar ?? $request->total;
            if (Schema::hasColumn('penjualans', 'jumlah_uang')) {
                $penjualan->jumlah_uang = $nominalBayar;
            } elseif (Schema::hasColumn('penjualans', 'bayar')) {
                $penjualan->bayar = $nominalBayar;
            }

            $nominalKembali = $request->kembali ?? 0;
            if (Schema::hasColumn('penjualans', 'kembalian')) {
                $penjualan->kembalian = $nominalKembali;
            } elseif (Schema::hasColumn('penjualans', 'kembali')) {
                $penjualan->kembali = $nominalKembali;
            }

            // 6. METODE PEMBAYARAN
            if (Schema::hasColumn('penjualans', 'metode_pembayaran')) {
                $penjualan->metode_pembayaran = $request->metode_pembayaran;
            }

            $penjualan->save();

            // 7. SIMPAN DETAIL BARANG
            foreach ($request->items as $item) {
                $barang = Barang::where('nama_barang', $item['nama'])->first();
                $detail = new DetailPenjualan();

                $primaryPenjualan = $penjualan->getKey();
                if (Schema::hasColumn('detail_penjualans', 'penjualan_id')) {
                    $detail->penjualan_id = $primaryPenjualan;
                } elseif (Schema::hasColumn('detail_penjualans', 'id_penjualan')) {
                    $detail->id_penjualan = $primaryPenjualan;
                }

                if ($barang) {
                    $primaryBarang = $barang->getKey();
                    if (Schema::hasColumn('detail_penjualans', 'barang_id')) {
                        $detail->barang_id = $primaryBarang;
                    } elseif (Schema::hasColumn('detail_penjualans', 'id_barang')) {
                        $detail->id_barang = $primaryBarang;
                    }
                }

                if (Schema::hasColumn('detail_penjualans', 'qty')) {
                    $detail->qty = $item['qty'];
                } elseif (Schema::hasColumn('detail_penjualans', 'jumlah')) {
                    $detail->jumlah = $item['qty'];
                }

                // ISI HARGA SATUAN (BEBERAPA NAMA KOLOM)
                if (Schema::hasColumn('detail_penjualans', 'harga_satuan')) {
                    $detail->harga_satuan = $item['harga'];
                }
                if (Schema::hasColumn('detail_penjualans', 'harga')) {
                    $detail->harga = $item['harga'];
                }
                if (Schema::hasColumn('detail_penjualans', 'harga_jual')) {
                    $detail->harga_jual = $item['harga'];
                }

                if (Schema::hasColumn('detail_penjualans', 'subtotal')) {
                    $detail->subtotal = $item['harga'] * $item['qty'];
                }

                $detail->save();
            }

            DB::commit();

            return response()->json([
                'status'  => 'success',
                'message' => 'Transaksi Berhasil!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}