<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjualans'; // Sesuaikan jika nama tabelmu 'detail_penjualan'
    protected $guarded = [];

    // Relasi balik ke barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}