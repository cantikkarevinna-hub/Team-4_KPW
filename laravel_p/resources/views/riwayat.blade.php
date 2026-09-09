@extends('template.master')

@section('title', 'Riwayat Transaksi')

@section('content')

<div class="p-4 rounded-4" style="background-color:#121318; min-height:100vh;">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color:#25435D !important;">
        <h3 class="m-0 fw-bold" style="color:#ffffff;">
            <i class="bi bi-clock-history me-2" style="color:#B9D3E2;"></i>
            Riwayat Transaksi
        </h3>
    </div>

    <!-- TABEL RIWAYAT -->
    <div class="card p-3 border-0 shadow-sm rounded-4" style="background-color:#1E222D;">
        <div class="table-responsive">
            <table class="table table-borderless align-middle text-white m-0 text-nowrap">
                <thead class="border-bottom" style="border-color:#25435D !important; color:#87A4B5;">
                    <tr>
                        <th class="py-3">NO. FAKTUR</th>
                        <th class="py-3">TANGGAL</th>
                        <th class="py-3">TOTAL BAYAR</th>
                        <th class="py-3">METODE</th>
                        <th class="py-3 text-center">AKSI</th>
                        <th class="py-3 text-center">CETAK</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayats as $row)
                        <tr class="border-bottom" style="border-color:rgba(37,67,93,.4) !important;">
                            <td class="fw-semibold" style="color:#B9D3E2;">
                                {{ $row->no_faktur ?? $row->kode_transaksi ?? '-' }}
                            </td>
                            <td style="color:#87A4B5;">
                                {{ $row->tanggal ?? $row->created_at }}
                            </td>
                            <td class="fw-bold" style="color:#52D68A;">
                                Rp {{ number_format($row->total_bayar ?? $row->total ?? 0, 0, ',', '.') }}
                            </td>
                            <td>
                                <span class="badge px-3 py-2 rounded-pill" style="background-color:#25435D; color:#B9D3E2;">
                                    {{ strtoupper($row->metode_pembayaran ?? 'CASH') }}
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm fw-semibold px-3 border-0" 
                                        style="background-color:#7D0018; color:#ffffff;"
                                        onclick="bukaDetail('{{ $row->no_faktur ?? $row->kode_transaksi }}', '{{ $row->tanggal ?? $row->created_at }}', '{{ number_format($row->total_bayar ?? $row->total ?? 0, 0, ',', '.') }}', '{{ number_format($row->jumlah_uang ?? $row->bayar ?? $row->total_bayar ?? 0, 0, ',', '.') }}', '{{ number_format($row->kembalian ?? $row->kembali ?? 0, 0, ',', '.') }}', '{{ strtoupper($row->metode_pembayaran ?? 'CASH') }}')">
                                    <i class="bi bi-eye me-1"></i> Detail
                                </button>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm fw-semibold px-3 border-0 text-dark" 
                                        style="background-color:#00C2FF;"
                                        onclick="cetakStruk('{{ $row->no_faktur ?? $row->kode_transaksi }}', '{{ $row->tanggal ?? $row->created_at }}', '{{ number_format($row->total_bayar ?? $row->total ?? 0, 0, ',', '.') }}', '{{ strtoupper($row->metode_pembayaran ?? 'CASH') }}')">
                                    <i class="bi bi-printer me-1"></i> Struk
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5" style="color:#87A4B5;">
                                <i class="bi bi-receipt-cutoff fs-2 d-block mb-2"></i>
                                Belum ada riwayat transaksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- MODAL POPUP DETAIL TRANSAKSI -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-white rounded-4 border-0" style="background-color:#1E222D; border:1px solid #25435D !important;">
            <div class="modal-header border-bottom" style="border-color:#25435D !important;">
                <h5 class="modal-title fw-bold" style="color:#B9D3E2;">
                    <i class="bi bi-receipt me-2"></i> Rincian Transaksi
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 p-3 rounded-3" style="background-color:#121318; border:1px solid #25435D;">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="color:#87A4B5;">No. Faktur:</span>
                        <strong id="detailFaktur" style="color:#B9D3E2;">-</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span style="color:#87A4B5;">Tanggal:</span>
                        <span id="detailTanggal" class="text-white">-</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span style="color:#87A4B5;">Metode Bayar:</span>
                        <span id="detailMetode" class="badge bg-secondary">-</span>
                    </div>
                </div>

                <!-- RINCIAN PEMBAYARAN -->
                <div class="p-3 rounded-3" style="background-color:#121318; border:1px solid #25435D;">
                    <div class="d-flex justify-content-between mb-2">
                        <span style="color:#87A4B5;">Total Belanja:</span>
                        <strong id="detailTotal" style="color:#ffffff;">Rp 0</strong>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span style="color:#87A4B5;">Uang Diterima:</span>
                        <strong id="detailBayar" style="color:#52D68A;">Rp 0</strong>
                    </div>
                    <div class="d-flex justify-content-between pt-2 border-top" style="border-color:#25435D !important;">
                        <span style="color:#87A4B5;">Kembalian:</span>
                        <strong id="detailKembali" style="color:#52D68A;">Rp 0</strong>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary w-100 fw-semibold" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT POPUP & CETAK STRUK -->
<script>
function bukaDetail(noFaktur, tanggal, total, bayar, kembali, metode) {
    document.getElementById('detailFaktur').innerText = noFaktur;
    document.getElementById('detailTanggal').innerText = tanggal;
    document.getElementById('detailMetode').innerText = metode;
    document.getElementById('detailTotal').innerText = 'Rp ' + total;
    document.getElementById('detailBayar').innerText = 'Rp ' + bayar;
    document.getElementById('detailKembali').innerText = 'Rp ' + kembali;

    var modal = new bootstrap.Modal(document.getElementById('modalDetail'));
    modal.show();
}

function cetakStruk(noFaktur, tanggal, total, metode) {
    let isiStruk = `
        ================================
                STRUK PEMBAYARAN        
        ================================
        No Faktur : ${noFaktur}
        Tanggal   : ${tanggal}
        Metode    : ${metode}
        --------------------------------
        TOTAL     : Rp ${total}
        ================================
            Terima Kasih Atas 
           Kunjungan Anda!
        ================================
    `;

    let win = window.open('', '', 'height=500,width=400');
    win.document.write('<pre style="font-family:monospace; font-size:14px;">' + isiStruk + '</pre>');
    win.document.close();
    win.print();
    win.close();
}
</script>

@endsection 