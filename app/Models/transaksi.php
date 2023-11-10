<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['kasir','pendapatan','keuntungan','bayar','kembali'] ;
    protected $table = 'transaksi';
}
