@extends('template.master')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom border-secondary">
  <h2><i class="bi bi-receipt me-2"></i> Riwayat Transaksi</h2>
</div>

<div class="card p-3">
  <div class="table-responsive">
    <table class="table table-dark table-striped align-middle">
      <thead>
        <tr>
          <th>No. Nota</th>
          <th>Tanggal & Waktu</th>
          <th>Kasir</th>
          <th>Total Pembayaran</th>
          <th>Status</th>
          <th width="100">Cetak</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>#TRX-20260814-01</td>
          <td>14 Aug 2026, 13:00</td>
          <td>Alex</td>
          <td>Rp 41.000</td>
          <td><span class="badge bg-success">Lunas</span></td>
          <td><button class="btn btn-sm btn-info text-white"><i class="bi bi-printer"></i> Struk</button></td>
        </tr>
        <tr>
          <td>#TRX-20260814-02</td>
          <td>14 Aug 2026, 12:45</td>
          <td>Alex</td>
          <td>Rp 75.000</td>
          <td><span class="badge bg-success">Lunas</span></td>
          <td><button class="btn btn-sm btn-info text-white"><i class="bi bi-printer"></i> Struk</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection