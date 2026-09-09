<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    // KASIH TAHU LARAVEL NAMA PRIMARY KEY YANG BENAR
    protected $primaryKey = 'id_penjualan';

    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan', 'id_penjualan');
    }
}