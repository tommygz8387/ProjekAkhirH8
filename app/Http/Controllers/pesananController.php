<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Pesanan;
use App\Pelanggan;
use App\Produk;
use Carbon\Carbon;
use App\Imports\PesananImport;
use Maatwebsite\Excel\Facades\Excel;


class pesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['dataPesanan'] = Pesanan::orderBy('created_at', 'DESC')->get();
        // dd($data);
        return view('pesanan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['dataProduk'] = Produk::get();
        $data['dataPelanggan'] = Pelanggan::get();
        return view('pesanan.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $today = Carbon::now('GMT+7');
        $random = random_int(10000, 99999);
        $invoice = $today->year . '/' . $today->month . '/' . $today->day . '/' . $random;

        $produk = Produk::find($request->produk_id);
        $total = $request->qty * $produk->harga;

        
        $store = Pesanan::create(array_merge($request->all(), ['invoice_id' => $invoice,'total_harga'=>$total]));
        // dd($request->all());
        if(!$store){
            Alert::error('error','Data Added Failed');
            return redirect()->route('pesanan.index');
        } else {
            Alert::success('success','Data Added successfully');
            return redirect()->route('pesanan.index');
        }
    }

    public function import(Request $request)
    {
        //
        $this->validate($request,[
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $namafile = rand().'_'.$file->getClientOriginalName();
        $file->move('DataPesanan', $namafile);

        $imp = Excel::import(new PesananImport, public_path('/DataPesanan/'.$namafile));

        if(!$imp){
            Alert::error('error','Import Data Failed');
            return redirect()->route('pesanan.index');
        } else {
            Alert::success('success','Import Data Success');
            return redirect()->route('pesanan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['dataProduk'] = Produk::get();
        $data['dataPelanggan'] = Pelanggan::get();
        $data['edit'] = Pesanan::find($id);
        if(!$data['edit']){
            Alert::error('error','Data Not Found!');
            return redirect()->route('pelanggan.index');
        }
        return view('pesanan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = Pesanan::updateOrCreate(['id' => $id], $request->all());

        if (!$update) {
            Alert::error('error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('success','Data Updated Successfully');
            return redirect()->route('pesanan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = Pesanan::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('error','Data Not Found!');
            return redirect()->route('pesanan.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('error','Data Cannot Be Deleted!');
            return redirect()->route('pesanan.index');
        }else{
            Alert::success('success','Data Has Been Deleted!');
            return redirect()->route('pesanan.index');
        }
    }
}
