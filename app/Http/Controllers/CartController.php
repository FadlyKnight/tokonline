<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Auth;

use Cart;
use App\Keranjang;
use App\User;
use App\Pemesanan;
use App\Produk;

class CartController extends Controller
{
    public function tambah(Request $request)
    {
        
        $produk_id = $request->id;
        $sub_total = Produk::where('id',$produk_id)
        ->select('*')->first();
        $user_id = Auth::user()->id;
        $pemesanan = Pemesanan::where([
            ['user_id',$user_id],
            ['status','=', NULL],
            ])
        ->select('*')
        ->first();

        
        // CEK KERANJANG dengan Pemesanan dan Produk yang sama 
        $produk_keranjang = Keranjang::where([
                    ['pemesanan_id','=',$pemesanan->id],
                    ['produk_id','=',$produk_id],
                    ]);
               
        if ($produk_keranjang->count() > 0 ) {
            $jumlah = $produk_keranjang->first()->jumlah; 
            $jumlah = $jumlah + 1;
            
            $sub_total = $produk_keranjang->first()->sub_total; 
            $sub_total = $sub_total + $sub_total;
            $produk_keranjang->update([
                'jumlah' => $jumlah,
            ]);
        } else {
            Keranjang::Create([
                'produk_id' => $produk_id,
                'pemesanan_id' => $pemesanan->id,
                'jumlah' => 1,
                'sub_total' => $sub_total->harga,

            ]);   
        }
    }

    public function tampil()
    {
        $user_id = Auth::user()->id;
        $pemesanan = Pemesanan::where([
            ['user_id',$user_id],
            ['status','=', NULL],
            ])
        ->select('*')
        ->first();

        $produk = Produk::where([
            ['Stok', '>', 0]
        ])->select('*')->get();


        foreach ($produk as  $value) {
            $simpan[] = $value->id;
        }
        
        // CEK KERANJANG dengan Pemesanan dan Produk yang sama 
        $keranjang = Keranjang::WhereIn(
                    'produk_id',$simpan,
                    )->where( 'pemesanan_id','=',$pemesanan->id)
                    ->get();
                 

        // $keranjang = Keranjang::all();
        return view('frontend.cart', compact('keranjang'));
    }

    public function updateJumlah(Request $request, Keranjang $keranjang){
        $id_ker = $request->id;
        $jum = $request->jumlah;
        $keranjang->where('id', $id_ker)->update(['jumlah' => $jum]);
        
    }

    public function destroy($id)
    {
        $cart = Keranjang::find($id);
        $cart->delete();

        return redirect()->back()->with('sukses','Berhasil Dihapus');
    }
}
