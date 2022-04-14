<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produk;

class Kategori extends Model
{
    //
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_kategori','nama_kategori'
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
