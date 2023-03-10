@extends('layouts.backend.a-navbar')

        <!-- Bootstrap fileupload js -->
        
@section('content')

<a href="{{ route('produk.index') }}" class="btn btn-success">Kembali</a>
<div class="container">
    {{-- untuk br --}}
    <h1></h1>
</div>


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Data Produk</h4>
            
            <form action="{{ route('produk.update', $produk->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                <div class="form-group row">
                        <label class="col-3 col-form-label">Nama Produk</label>
                        <div class="col-6">
                            <input required type="text" value="{{$produk->nama_produk}}" name="nama_produk" placeholder="e.g.  Pupuk Organik" class="form-control">
                        </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label">Gambar Produk</label>
                    <div class="col-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            @if ( $produk->gambar == NULL )
                                <img src="{{ asset('template/backend/assets/images/small/img-1.jpg')}}" alt="image" class="img-fluid" />
                            @else
                                <img src="{{ asset('images/produk/'.$produk->gambar) }}" alt="image" class="img-fluid" />
                            @endif
                                
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <button type="button" class="btn btn-custom btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" class="btn-light" name="gambar" />
                                </button>
                                {{-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> --}}
                            </div>
                        </div>
                        {{-- <div class="alert alert-info"><strong>Notice!</strong> Image preview only works in IE10+, FF3.6+, Chrome6.0+ and Opera11.1+. In older browsers and Safari, the filename is shown instead.</div> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label">Harga Produk (Rp.)</label>
                    <div class="col-6">
                        <input required value="{{$produk->harga}}" name="harga" type="text" placeholder="e.g. RP. 1,500,000" data-a-sign="RP. " class="form-control autonumber">
                        {{-- <span class="font-14 text-muted">e.g. "RP. 1,500,000"</span> --}}
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-3 col-form-label">Deskripsi</label>
                    <div class="col-6">
                        <textarea name="deskripsi" placeholder="e.g. Deskripsi Produk" id="" cols="30" rows="10" class="form-control">{{ $produk->deskripsi }}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 col--xs6 col-form-label" for="category"></label> 
                    {{-- <div class="row"> --}}
                        <div class="col-md-3 col--xs6">
                            <select required name="kategori" id="kategori" class="form-control btn-rounded">
                                <option value="{{ $produk->kategori }}">{{ $produk->memilikiKategori->kategori }}</option>
                                @foreach (\App\Kategori::all() as $item)
                                    <option value="{{$item->id}}">{{$item->kategori}}</option>          
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col--xs6">
                            <input required type="number" min="0" name="stok" placeholder="Stok Produk" value="{{ $produk->stok }}" class="form-control">
                        </div>
                    {{-- </div> --}}
                </div>

                <br/>
                <div class="form-group row">
                    <label class="col-md-3 col-xs-6 col-form-label" for="category"></label>

                    <input type="submit" class="btn btn-success col-xs-6" value="Tambah">&nbsp;&nbsp;&nbsp;
                    <input type="reset" class="btn btn-danger col-xs-6" value="Reset">
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection