@extends('template.master')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="p-4 rounded-4" style="background-color: #121318; min-height: 100vh; color: #E1E7ED;">
  
  <!-- Header Halaman -->
  <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #25435D !important;">
    <div>
      <h2 class="fw-bold mb-1 text-white">
        <i class="bi bi-clock-history me-2" style="color: #B9D3E2;"></i> Riwayat Transaksi
      </h2>
      <p class="text-muted small mb-0" style="color: #87A4B5 !important;">Daftar seluruh rekam transaksi penjualan kasir</p>
    </div>
    <span class="badge px-3 py-2 rounded-3 fw-semibold" style="background-color: #1E222D; color: #B9D3E2; border: 1px solid #25435D;">
      <i class="bi bi-calendar3 me-1"></i> Hari Ini: {{ date('d M Y') }}
    </span>
  </div>

  <!-- KPI Ringkasan Transaksi Hari Ini -->
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="card p-3 border-0 shadow-sm rounded-4" style="background-color: #1E222D; border-left: 4px solid #B9D3E2 !important;">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <span class="small fw-semibold" style="color: #87A4B5;">Total Omzet Hari Ini</span>
            <h4 class="fw-bold mb-0 mt-1 text-white">Rp 116.000</h4>
          </div>
          <div class="p-3 rounded-4" style="background-color: #121318; color: #B9D3E2;">
            <i class="bi bi-cash-stack fs-4"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3 border-0 shadow-sm rounded-4" style="background-color: #1E222D; border-left: 4px solid #52D68A !important;">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <span class="small fw-semibold" style="color: #87A4B5;">Transaksi Lunas</span>
            <h4 class="fw-bold mb-0 mt-1" style="color: #52D68A;">2 Nota</h4>
          </div>
          <div class="p-3 rounded-4" style="background-color: #121318; color: #52D68A;">
            <i class="bi bi-check-circle fs-4"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3 border-0 shadow-sm rounded-4" style="background-color: #1E222D; border-left: 4px solid #FF6B6B !important;">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <span class="small fw-semibold" style="color: #87A4B5;">Transaksi Void</span>
            <h4 class="fw-bold mb-0 mt-1" style="color: #FF6B6B;">1 Nota</h4>
          </div>
          <div class="p-3 rounded-4" style="background-color: #121318; color: #FF6B6B;">
            <i class="bi bi-x-circle fs-4"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Filter & Search Bar Operasional -->
  <div class="card p-3 border-0 shadow-sm rounded-4 mb-4" style="background-color: #1E222D;">
    <div class="row g-2">
      <div class="col-lg-5 col-md-12">
        <div class="input-group">
          <span class="input-group-text border-0" style="background-color: #121318; color: #87A4B5;">
            <i class="bi bi-search"></i>
          </span>
          <input type="text" id="filterKeyword" class="form-control border-0 py-2" placeholder="Cari No. Nota atau Nama Kasir..." style="background-color: #121318; color: #ffffff;">
        </div>
      </div>
      <div class="col-lg-3 col-md-5">
        <select id="filterMetode" class="form-select border-0 py-2" style="background-color: #121318; color: #B9D3E2;">
          <option value="">Semua Metode Bayar</option>
          <option value="Tunai">Tunai / Cash</option>
          <option value="QRIS">QRIS / E-Wallet</option>
          <option value="Debit">Kartu Debit</option>
        </select>
      </div>
      <div class="col-lg-3 col-md-5">
        <select id="filterStatus" class="form-select border-0 py-2" style="background-color: #121318; color: #B9D3E2;">
          <option value="">Semua Status</option>
          <option value="Lunas">Lunas</option>
          <option value="Void">Void / Dibatalkan</option>
        </select>
      </div>
      <div class="col-lg-1 col-md-2 d-flex">
        <button type="button" class="btn w-100 fw-semibold border-0 py-2" style="background-color: #7D0018; color: #ffffff;" title="Reset Filter" onclick="resetFilter()">
          <i class="bi bi-arrow-counterclockwise"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Main Card Table -->
  <div class="card p-4 border-0 shadow-sm rounded-4" style="background-color: #1E222D;">
    <div class="table-responsive">
      <table class="table align-middle m-0" style="background-color: #121318 !important; color: #B9D3E2 !important; border-color: rgba(37, 67, 93, 0.4) !important;">
        <thead>
          <tr style="background-color: #1E222D !important; color: #ffffff !important; border-bottom: 2px solid #25435D;">
            <th class="py-3 ps-3">No. Nota</th>
            <th class="py-3">Waktu</th>
            <th class="py-3">Kasir</th>
            <th class="py-3">Metode Bayar</th>
            <th class="py-3">Total Pembayaran</th>
            <th class="py-3">Status</th>
            <th class="py-3 text-center pe-3" width="220">Aksi Operasional</th>
          </tr>
        </thead>
        <tbody>
          <!-- Baris 1: Cash -->
          <tr style="border-bottom: 1px solid rgba(37, 67, 93, 0.3);">
            <td class="py-3 ps-3">
              <span class="badge font-monospace px-2 py-1" style="background-color: #1E222D; color: #B9D3E2; border: 1px solid #25435D;">#TRX-20260814-01</span>
            </td>
            <td class="py-3" style="color: #87A4B5;">13:00 WIB</td>
            <td class="py-3 fw-semibold text-white">Alex</td>
            <td class="py-3" style="color: #87A4B5;"><i class="bi bi-cash me-1 text-success"></i> Tunai</td>
            <td class="py-3 fw-bold" style="color: #B9D3E2;">Rp 41.000</td>
            <td class="py-3">
              <span class="badge rounded-pill px-3 py-1.5" style="background-color: rgba(82, 214, 138, 0.15); color: #52D68A; border: 1px solid #52D68A;">Lunas</span>
            </td>
            <td class="py-3 text-center pe-3">
              <div class="btn-group">
                <button class="btn btn-sm me-1 rounded-2 border-0" style="background-color: #121318; color: #B9D3E2;" 
                        data-bs-toggle="modal" data-bs-target="#modalDetailTRX" 
                        onclick="showDetail('#TRX-20260814-01', 'Tunai', 'Rp 41.000', 'Rp 50.000', 'Rp 9.000', [
                          {nama: '2x Kopi Susu Gula Aren', sub: 'Rp 30.000', unit: '@ Rp 15.000'},
                          {nama: '1x Roti Bakar Cokelat', sub: 'Rp 11.000', unit: '@ Rp 11.000'}
                        ])">
                  <i class="bi bi-eye me-1"></i> Detail
                </button>
                <button class="btn btn-sm me-1 rounded-2 border-0" style="background-color: #7D0018; color: #ffffff;" 
                        onclick="cetakStruk('#TRX-20260814-01')">
                  <i class="bi bi-printer me-1"></i> Struk
                </button>
                <button class="btn btn-sm rounded-2 border-0" style="background-color: rgba(255, 51, 75, 0.15); color: #FF6B6B;" 
                        data-bs-toggle="modal" data-bs-target="#modalVoidTRX" 
                        onclick="confirmVoid('#TRX-20260814-01')">
                  <i class="bi bi-x-circle"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Baris 2: QRIS -->
          <tr style="border-bottom: 1px solid rgba(37, 67, 93, 0.3);">
            <td class="py-3 ps-3">
              <span class="badge font-monospace px-2 py-1" style="background-color: #1E222D; color: #B9D3E2; border: 1px solid #25435D;">#TRX-20260814-02</span>
            </td>
            <td class="py-3" style="color: #87A4B5;">12:45 WIB</td>
            <td class="py-3 fw-semibold text-white">Alex</td>
            <td class="py-3" style="color: #87A4B5;"><i class="bi bi-qr-code me-1 text-info"></i> QRIS</td>
            <td class="py-3 fw-bold" style="color: #B9D3E2;">Rp 75.000</td>
            <td class="py-3">
              <span class="badge rounded-pill px-3 py-1.5" style="background-color: rgba(82, 214, 138, 0.15); color: #52D68A; border: 1px solid #52D68A;">Lunas</span>
            </td>
            <td class="py-3 text-center pe-3">
              <div class="btn-group">
                <button class="btn btn-sm me-1 rounded-2 border-0" style="background-color: #121318; color: #B9D3E2;" 
                        data-bs-toggle="modal" data-bs-target="#modalDetailTRX" 
                        onclick="showDetail('#TRX-20260814-02', 'QRIS', 'Rp 75.000', 'Rp 75.000', 'Rp 0', [
                          {nama: '3x Nasi Goreng Spesial', sub: 'Rp 75.000', unit: '@ Rp 25.000'}
                        ])">
                  <i class="bi bi-eye me-1"></i> Detail
                </button>
                <button class="btn btn-sm me-1 rounded-2 border-0" style="background-color: #7D0018; color: #ffffff;" 
                        onclick="cetakStruk('#TRX-20260814-02')">
                  <i class="bi bi-printer me-1"></i> Struk
                </button>
                <button class="btn btn-sm rounded-2 border-0" style="background-color: rgba(255, 51, 75, 0.15); color: #FF6B6B;" 
                        data-bs-toggle="modal" data-bs-target="#modalVoidTRX" 
                        onclick="confirmVoid('#TRX-20260814-02')">
                  <i class="bi bi-x-circle"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Baris 3: Void -->
          <tr>
            <td class="py-3 ps-3">
              <span class="badge font-monospace px-2 py-1" style="background-color: #1E222D; color: #FF6B6B; border: 1px solid #7D0018;">#TRX-20260814-03</span>
            </td>
            <td class="py-3" style="color: #87A4B5;">12:20 WIB</td>
            <td class="py-3 fw-semibold text-white">Alex</td>
            <td class="py-3" style="color: #87A4B5;"><i class="bi bi-cash me-1"></i> Tunai</td>
            <td class="py-3 fw-bold text-decoration-line-through" style="color: #FF6B6B;">Rp 25.000</td>
            <td class="py-3">
              <span class="badge rounded-pill px-3 py-1.5" style="background-color: rgba(255, 51, 75, 0.15); color: #FF6B6B; border: 1px solid #FF6B6B;">Void</span>
            </td>
            <td class="py-3 text-center pe-3">
              <button class="btn btn-sm fw-semibold border-0 px-3 rounded-2" style="background-color: #121318; color: #87A4B5;" disabled>
                <i class="bi bi-slash-circle me-1"></i> Voided
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination Footer -->
    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top" style="border-color: #25435D !important;">
      <small style="color: #87A4B5;">Menampilkan 1 - 3 dari 3 transaksi</small>
      <ul class="pagination pagination-sm m-0">
        <li class="page-item disabled"><a class="page-link border-0" style="background-color: #121318; color: #87A4B5;">Prev</a></li>
        <li class="page-item active"><a class="page-link border-0 text-white" style="background-color: #7D0018;">1</a></li>
        <li class="page-item disabled"><a class="page-link border-0" style="background-color: #121318; color: #87A4B5;">Next</a></li>
      </ul>
    </div>

  </div>

</div>

<!-- MODAL DINAMIS DETAIL TRANSAKSI -->
<div class="modal fade" id="modalDetailTRX" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 rounded-4" style="background-color: #1E222D; color: #E1E7ED; border: 1px solid #25435D !important;">
      <div class="modal-header border-bottom pb-3" style="border-color: #25435D !important;">
        <h5 class="modal-title fw-bold text-white">
          <i class="bi bi-receipt me-2" style="color: #B9D3E2;"></i> Rincian <span id="detailNotaTitle">#TRX-000</span>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-3">
        
        <!-- List Item Belanja Dinamis -->
        <div id="itemListContainer" class="p-3 rounded-3 mb-3" style="background-color: #121318; border: 1px solid #25435D;">
          <!-- Item akan di-generate via JS -->
        </div>

        <!-- Rincian Pembayaran -->
        <div class="p-3 rounded-3" style="background-color: #121318;">
          <div class="d-flex justify-content-between mb-2 small" style="color: #87A4B5;">
            <span>Subtotal</span>
            <span class="text-white" id="detailSubtotal">Rp 0</span>
          </div>
          <div class="d-flex justify-content-between mb-2 small" style="color: #87A4B5;">
            <span>Uang Diterima (<span id="detailMetode">Tunai</span>)</span>
            <span class="text-white" id="detailBayar">Rp 0</span>
          </div>
          <div class="d-flex justify-content-between align-items-center fw-bold pt-2 border-top" style="border-color: #25435D !important; font-size: 1.1rem;">
            <span style="color: #87A4B5;">Kembalian</span>
            <span style="color: #52D68A;" id="detailKembali">Rp 0</span>
          </div>
        </div>

      </div>
      <div class="modal-footer border-top pt-3" style="border-color: #25435D !important;">
        <button type="button" class="btn btn-sm fw-semibold px-4 py-2 border-0" style="background-color: #7D0018; color: #ffffff;" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL KONFIRMASI VOID TRANSAKSI -->
<div class="modal fade" id="modalVoidTRX" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content border-0 rounded-4" style="background-color: #1E222D; color: #E1E7ED; border: 1px solid #7D0018 !important;">
      <div class="modal-body text-center p-4">
        <div class="d-inline-flex p-3 rounded-circle mb-3" style="background-color: rgba(255, 51, 75, 0.15); color: #FF6B6B;">
          <i class="bi bi-exclamation-triangle fs-2"></i>
        </div>
        <h5 class="fw-bold text-white mb-2">Batalkan Transaksi?</h5>
        <p class="small text-muted mb-3" style="color: #87A4B5 !important;">Apakah Anda yakin ingin melakukan Void pada nota <strong id="voidNotaTitle" class="text-white">#TRX-000</strong>?</p>
        <div class="d-flex gap-2 justify-content-center">
          <button type="button" class="btn btn-sm px-3 border-0 text-white" style="background-color: #121318;" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-sm px-3 border-0 fw-semibold" style="background-color: #7D0018; color: #ffffff;" onclick="submitVoid()">Ya, Void Nota</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SCRIPT JAVASCRIPT LOGIKA OPERASIONAL -->
<script>
  // Fungsi mengisikan data secara dinamis pada Modal Detail
  function showDetail(noNota, metode, subtotal, bayar, kembali, items) {
    document.getElementById('detailNotaTitle').innerText = noNota;
    document.getElementById('detailMetode').innerText = metode;
    document.getElementById('detailSubtotal').innerText = subtotal;
    document.getElementById('detailBayar').innerText = bayar;
    document.getElementById('detailKembali').innerText = kembali;

    const container = document.getElementById('itemListContainer');
    container.innerHTML = '';

    items.forEach((item, index) => {
      const isLast = index === items.length - 1;
      const borderStyle = isLast ? '' : 'border-bottom: 1px solid rgba(37, 67, 93, 0.4) !important; mb-2 pb-2';
      
      container.innerHTML += `
        <div class="d-flex justify-content-between align-items-center ${borderStyle}">
          <div>
            <div class="fw-semibold text-white">${item.nama}</div>
            <small style="color: #87A4B5;">${item.unit}</small>
          </div>
          <span class="fw-bold" style="color: #B9D3E2;">${item.sub}</span>
        </div>
      `;
    });
  }

  // Fungsi simulasi pencetakan Struk
  function cetakStruk(noNota) {
    alert('Mencetak Struk untuk Nota: ' + noNota);
  }

  // Fungsi menyiapkan data Void
  let selectedVoidNota = '';
  function confirmVoid(noNota) {
    selectedVoidNota = noNota;
    document.getElementById('voidNotaTitle').innerText = noNota;
  }

  // Fungsi eksekusi Void
  function submitVoid() {
    alert('Transaksi ' + selectedVoidNota + ' telah berhasil di-Void.');
    const modalEl = document.getElementById('modalVoidTRX');
    const modal = bootstrap.Modal.getInstance(modalEl);
    if(modal) modal.hide();
  }

  // Fungsi reset Filter
  function resetFilter() {
    document.getElementById('filterKeyword').value = '';
    document.getElementById('filterMetode').value = '';
    document.getElementById('filterStatus').value = '';
  }
</script>
@endsection
