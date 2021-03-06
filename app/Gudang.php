<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'nama_barang',
        'keterangan',
    ];

    public function stok(){
        return $this->hasMany(Stock::class);
    }

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
}
