<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        return view('produk', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barcode' => 'required',
            'nama_barang'  => 'required',
            'kategori_id'  => 'required',
            'harga_jual'   => 'required|numeric',
        ]);

        Barang::create([
            'kode_barcode' => $request->kode_barcode,
            'nama_barang'  => $request->nama_barang,
            'id_kategori'  => $request->kategori_id,
            'harga_beli'   => 0,
            'harga_jual'   => $request->harga_jual,
            'stok'         => 999,
        ]);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Mencari barang berdasarkan kolom id_barang
        $barang = Barang::where('id_barang', $id)->firstOrFail();
        $kategoris = Kategori::all();
        return view('produk.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barcode' => 'required',
            'nama_barang'  => 'required',
            'kategori_id'  => 'required',
            'harga_jual'   => 'required|numeric',
            'status'       => 'required',
        ]);

        $barang = Barang::where('id_barang', $id)->firstOrFail();
        $barang->update([
            'kode_barcode' => $request->kode_barcode,
            'nama_barang'  => $request->nama_barang,
            'id_kategori'  => $request->kategori_id,
            'harga_jual'   => $request->harga_jual,
            'stok'         => $request->status === 'ready' ? 999 : 0,
        ]);

        return redirect('/produk')->with('success', 'Data produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::where('id_barang', $id)->firstOrFail();
        $barang->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus!');
    }
}