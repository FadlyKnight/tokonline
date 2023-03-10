<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::paginate(10);
        return view('backend.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.produk.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $foto_produk = str_random(12) .".". $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path('images/produk'), $foto_produk);
        }

        $harga_produk = str_replace(['RP.','.',',00',' '],'',$request->harga);

        Produk::create([
            'nama_produk'=>request('nama_produk'),
            'gambar'=> $foto_produk,
            'harga'=>$harga_produk,
            'deskripsi'=>request('deskripsi'),
            'kategori'=>request('kategori'),
            'stok'=>request('stok'),
        ]);
        
        return redirect()->back()->with('pesan','Produk ditambahkan, Tambah Produk Lagi ?')->withInput();
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
        $produk = Produk::find($id);

        return view('backend.produk.edit',compact('produk'));
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
        $produk = Produk::find($id);

        if ($request->hasFile('gambar')) {
            $foto_produk = str_random(12) .".". $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move(public_path('images/produk'), $foto_produk);
              
            $produk->gambar =  $foto_produk; 
            $produk->save();
        }
        
        $harga_produk = str_replace(['RP.','.',',00',' '],'',$request->harga);
        $produk->update([
            'nama_produk'=>request('nama_produk'),
            'gambar'=> $produk->gambar,
            'harga'=>$harga_produk,
            'deskripsi'=>request('deskripsi'),
            'kategori'=>request('kategori'),
            'stok'=>request('stok'),
        ]);
        
        return redirect()->route('produk.index')->with('pesan','Profil Berhasil diupdate');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        
        $produk->delete();
        return redirect()->route('produk.index')->with('sukses', 'Produk Berhasil Dihapus');  
    }
}
