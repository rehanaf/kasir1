<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faktur extends Model
{
    use HasFactory;
    protected $fillable = ['faktur','nama','harga_beli','harga_jual','jumlah'] ;
    protected $table = 'faktur';
    public $timestamps = false;
}
