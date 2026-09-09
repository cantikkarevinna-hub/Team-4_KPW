public function riwayat()
{
    // Mengambil semua data penjualan urut dari yang terbaru
    $riwayats = Penjualan::orderBy('id_penjualan', 'desc')->get();

    return view('riwayat', compact('riwayats'));
}