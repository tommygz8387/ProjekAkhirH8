<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use RealRashid\SweetAlert\Facades\Alert;

class kategoriController extends Controller
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
        $data['dataKategori'] = Kategori::orderBy('created_at', 'DESC')->get();
        return view('kategori.create',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $store = Kategori::create($request->all());
        if(!$store){
            Alert::error('error','Data Added Failed');
            return redirect()->route('kategori.index');
        } else {
            Alert::success('success','Data Added successfully');
            return redirect()->route('kategori.index');
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
        $data['dataKategori'] = Kategori::orderBy('created_at', 'DESC')->get();
        $data['edit'] = Kategori::find($id);
        if(!$data['edit']){
            Alert::error('error','Data Not Found!');
            return redirect()->route('kategori.create');
        }
        return view('kategori.edit',$data);
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
        $update = Kategori::updateOrCreate(['id' => $id], $request->all());

        if (!$update) {
            Alert::error('error','Data Not Found!');
            return redirect()->back();
        }else{
            Alert::success('success','Data Updated Successfully');
            return redirect()->route('kategori.index');
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
        $destroy = Kategori::find($id);

        // cek data
        if (!$destroy) {
            Alert::error('error','Data Not Found!');
            return redirect()->route('kategori.index');
        }

        $destroy->delete();
        if (!$destroy) {
            Alert::error('error','Data Cannot Be Deleted!');
            return redirect()->route('kategori.index');
        }else{
            Alert::success('success','Data Has Been Deleted!');
            return redirect()->route('kategori.index');
        }
    }
}
