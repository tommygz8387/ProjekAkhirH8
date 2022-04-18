<?php

namespace App\Imports;

use App\Pesanan;
use Maatwebsite\Excel\Concerns\ToModel;

class PesananImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pesanan([
            //
            'nama_produk'=>$row[0],
            'name'=>$row[1],
            'invoice_id'=>$row[2],
            'qty'=>$row[3],
            'total_harga'=>$row[4],
            'date'=>$row[5],
            'status'=>$row[6],
            
        ]);
    }
}
