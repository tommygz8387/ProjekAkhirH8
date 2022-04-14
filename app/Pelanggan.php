<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pesanan;

class Pelanggan extends Model
{
    //
    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name','alamat'
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
