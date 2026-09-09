<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Beri tahu nama tabelnya
    protected $table = 'kategoris';
    
    // Beri tahu nama primary key-nya
    protected $primaryKey = 'id_kategori';
    
    // Kolom apa saja yang boleh diisi (dianyam) form
    protected $fillable = ['nama_kategori'];
}