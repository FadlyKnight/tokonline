<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::paginate(10);
        return view('backend.kategori.index', compact('kategori'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($data['slug'] == NULL ) {
            $data['slug'] = Str::slug($data['kategori']);
        }

        Kategori::create($data);
        return redirect()->back()->with('sukses', 'Kategori Berhasil ditambah');
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
        $data = $request->all();
        if ($data['slug'] == NULL ) {
            $data['slug'] = Str::slug($data['kategori']);
        }
        
        Kategori::find($id)->update($data);
        return redirect()->back()->with('sukses', 'Kategori Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect()->back()->with('sukses', 'Kategori Berhasil dihapus');
    
    }
}
