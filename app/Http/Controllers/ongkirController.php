<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Alamat;
use App\Jasa;
use App\Keranjang;
use App\Pemesanan;
use App\Produk;
use App\Diskon;
use App\Http\Requests;

class ongkirController extends Controller
{
    public function tampil(Request $request)
    {
        $user_id = Auth::user()->id;
        $tot = $request->tot1;
        $al = Alamat::where('id_user', $user_id)->get();

        //menghitung jumlah berat barang yang dibeli------------------------------------------
        $pemesanan = Pemesanan::where([
            ['user_id',$user_id],
            ['status','=', NULL],
            ])
        ->select('*')
        ->first();

        $produk = Produk::where([
            ['Stok', '>', 0]
        ])->select('*')->get();

        ;
        foreach ($produk as  $value) {
            $simpan[] = $value->id;
        }

        $keranjang = Keranjang::WhereIn(
            'produk_id',$simpan,
            )->where( 'pemesanan_id','=',$pemesanan->id)
            ->get();

        $jumlah=0;
        foreach ($keranjang as $value) {
            $berat = $produk->where('id', $value->produk_id)->first()->berat;
            $j = $value->jumlah * $berat;
            $jumlah+= $j; 
        }
        // ------------------------------------------------------------------------------------

        $user = Auth::user();
        $lastData = Pemesanan::latest()->first();
        $kode_verifikasi = $lastData->kode_verifikasi;
        
        $cart = Keranjang::where('pemesanan_id',$pemesanan->id);

        return view('frontend.ongkir', compact('tot', 'al','jumlah','user','kode_verifikasi','cart'));
    }


    public function jumlahDiskon(Request $request, Diskon $diskon)
    {
        $jDiskon = $diskon->where('kode_diskon','=',$request->k_dis)->first();
        
        return $jDiskon;
    }
    
    public function pesan(Request $request, Pemesanan $pemesanan, Diskon $diskon, Alamat $alamat)
    {

        // dd( $request->jasa );
        // dd( explode("-",$request->jasa) );
        $jasa = $request->jasa;
        $user_id = Auth::user()->id;
        $pemesanan1 = Pemesanan::where([
            ['user_id',$user_id],
            ['status','=', NULL],
            ])
        ->select('*')
        ->first();

        $lastData = Pemesanan::latest()->first();

		$kode_verifikasi = $lastData->kode_verifikasi;
        
		if($kode_verifikasi >= 999)
		{
			$kode_verifikasi = 1;
		} else {
			$kode_verifikasi = $kode_verifikasi+1;
        }


        $pemesanan->where('id', '=', $pemesanan1->id)
        ->update([
            'alamat_id' => $jasa,
            'total_harga' => $request->total+10000 /*Ongkir 10000*/ ,
            'status' => 'Checkout',
            'status_pesan' => 'Default',
            'kode_verifikasi' => $kode_verifikasi,
        ]);

        $diskon->where('kode_diskon','=',$request->kod)->update(['status_diskon' => 'Sudah']);

        Pemesanan::create([
            'user_id' => $user_id
        ]);

        return redirect('/history/pesan')->with('sukses', 'Silahkan Lakkukan pembayaran');
        // return 'mantap';
        // return view('frontend.ongkir', compact('tot', 'al','jumlah'));
    }
    
}
