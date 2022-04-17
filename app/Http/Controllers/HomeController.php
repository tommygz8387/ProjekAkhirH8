<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Pesanan;
use App\Pelanggan;
use App\Produk;
use App\Kategori;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['kategori'] = Kategori::count();
        $data['produk'] = Produk::count();
        $data['pelanggan'] = Pelanggan::count();
        $data['selesai'] = Pesanan::where('status','Selesai')->count();
        $data['proses'] = Pesanan::where('status','Proses')->count();

        $tstart = Carbon::today("GMT+7");
        $tend = Carbon::today("GMT+7")->endOfDay("GMT+7");
        $data['baru'] = Pesanan::whereBetween('date', [$tstart, $tend])->where('status', 'Proses')->count();
        $data['kirim'] = Pesanan::where([['date', '<=', Carbon::yesterday("GMT+7")], ['status', 'Proses']])->count();
        $data['omset'] = Pesanan::where('status', 'selesai')->sum('total_harga');
        return view('home',$data);
    }
    public function adminHome()
    {
        //
        $data['kategori'] = Kategori::count();
        $data['produk'] = Produk::count();
        $data['pelanggan'] = Pelanggan::count();
        $data['selesai'] = Pesanan::where('status','Selesai')->count();
        $data['proses'] = Pesanan::where('status','Proses')->count();

        $data['baru'] = Pesanan::where([['date', '>=', Carbon::today("GMT+7")->subWeek()], ['status', 'Proses']])->count();
        $data['kirim'] = Pesanan::where([['date', '<=', Carbon::yesterday("GMT+7")], ['status', 'Proses']])->count();
        $data['omset'] = Pesanan::where('status', 'Selesai')->sum('total_harga');
        // $data['sales'] = Pesanan::where('status', 'Proses')->sum('total_harga');
        return view('adminHome',$data);
    }
}
