<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produk;
use App\Pemesanan;
use App\Slider;
use App\Testimoni;
use App\Kontak;
use App\User;
use Response;
use DB;
use Storage;
use File;

use Illuminate\Support\Facades\Auth;
use App\Kategori;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::select('*')->orderBy('created_at', 'desc')->paginate(3);
        $slider = $this->slider();
        $testi = $this->testi();
        return view('frontend.index', compact('produk', 'slider','testi'));        
    }

    
    public function slider(){
        $slider = Slider::limit(3)->orderBy('id', 'desc')->get();
        return $slider;
    }

    public function testi(){
        $testi = Testimoni::limit(3)->orderBy('id', 'desc')->get();
        return $testi;
    }

    public function kategori_produk(Request $request){

        $kategori = Kategori::where('slug', $request->kategori)->first()->id;
        $produk = \DB::table('produk')->where('kategori',$kategori);
        dd($kategori, $produk);

        return view('frontend.allproduk', compact('produk'));  
    }
    public function allproduk(Request $request)
    {
        // $produk = \DB::table('produk');
        $produk = Produk::where('id', '!=' ,0);

        if ($request->has('kategori') && $request->kategori != NULL ) {
            $kategori = Kategori::where('slug', $request->kategori)->first();
            $produk = ($kategori != NULL) ? $produk->where('kategori',$kategori->id) : $produk;
            
            // dd($produk->get(), $produk->where('kategori',$kategori->id)->get(), $kategori->id );
        }
        if ($request->has('search') && $request->search != NULL) {
            $produk->where('nama_produk','LIKE','%'.$request->search.'%');
            
        }

        $produk = $produk->paginate(21);

        return view('frontend.allproduk', compact('produk'));        
    }

    // public function keranjang()
    // {   
    //     if (Auth::check()) {
    //         $user_id = Auth::user()->id;
    //         $pemesanan = Pemesanan::where([
    //             ['user_id',$user_id],
    //             ['status','=', NULL],
    //             ])
    //         ->select('*')
    //         ->first();
    //         $keranjang = Keranjang::where( 'pemesanan_id','=',$pemesanan->id)
    //                     ->count();
    //     } else {
    //         $keranjang = 0;
    //     }

    //     return $keranjang;
    // }
    


}
