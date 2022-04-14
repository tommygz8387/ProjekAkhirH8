<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produk;
use App\Pelanggan;

class Pesanan extends Model
{
    //
    protected $table = 'pesanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'produk_id','pelangan_id','invoice_id','qty','total_harga','status','date'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
