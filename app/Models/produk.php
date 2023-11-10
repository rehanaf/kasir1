<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = ['nama','kode','harga_beli','harga_jual','stok','gambar'] ;
    protected $table = 'produk';
}
