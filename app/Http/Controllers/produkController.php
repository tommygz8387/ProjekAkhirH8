<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Produk;
use App\Kategori;
use File;

class produkController extends Controller
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
        // $data['dataKategori'] = Kategori::get();
        $data['dataProduk'] = Produk::orderBy('created_at', 'DESC')->get();
        // dd($data);
        return view('produk.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['dataKategori'] = Kategori::get();
        return view('produk.create',$data);
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
        if($request->foto_produk){
                $foto_produk = $request->foto_produk;
                $str = Str::random(8);
                $getExt = $foto_produk->getClientOriginalExtension();
                $namafile = $str.'.'.$getExt;
                $foto_produk->move('foto_produk', $namafile);
                // dd($namafile);
            }
        $store = Produk::create(array_merge($request->all(), ['foto_produk' => $namafile]));
        if(!$store){
            Alert::error('error','Data Added Failed');
            return redirect()->route('produk.index');
        } else {
            Alert::success('success','Data Added successfully');
            return redirect()->route('produk.index');
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
        $data['dataKategori'] = Kategori::get();
        $data['edit'] = Produk::find($id);
        if(!$data['edit']){
            Alert::error('error','Data Not Found!');
            return redirect()->route('produk.create');
        }
        return view('produk.edit',$data);
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
        $update = Produk::find($id);

        if (!$update) {
            Alert::error('error','Data Not Found!');
            return redirect()->back();
        }

                //cek update foto
        if ($request->hasFile('foto_produk')) {
            $path = 'foto_produk/'.$update->foto_produk;
            if (File::exists($path)) {
                File::delete($path);
            }

            $foto_produk = $request->foto_produk;
            $str = Str::random(8);
            $getExt = $foto_produk->getClientOriginalExtension();
            $namafile = $str.'.'.$getExt;
            $foto_produk->move('foto_produk', $namafile);
        }else{
            $namafile = $update->foto_produk;
        }
        
        $dataInput = array_merge($request->all(),['foto_produk'=>$namafile]);

        $inputUpdate = Produk::updateOrCreate(['id'=>$id], $dataInput);

        if (!$inputUpdate) {
            Alert::error('error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('success','Data Updated Successfully');
            return redirect()->route('produk.index');
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
        $destroy = Produk::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('error','Data Not Found!');
            return redirect()->route('produk.index');
        }

        // kondisi hapus foto
        if ($destroy->foto_produk) {
            $path = 'foto_produk/'.$destroy->foto_produk;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('error','Data Cannot Be Deleted!');
            return redirect()->route('produk.index');
        }else{
            Alert::success('success','Data Has Been Deleted!');
            return redirect()->route('produk.index');
        }
    }
}
