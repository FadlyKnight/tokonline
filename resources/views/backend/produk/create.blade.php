@extends('layouts.backend.a-navbar')

        <!-- Bootstrap fileupload js -->
        
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Data Produk</h4>
            
            <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form-group row">
                        <label class="col-3 col-form-label">Nama Produk</label>
                        <div class="col-6">
                            <input required type="text" name="nama_produk" placeholder="e.g.  Pupuk Organik" class="form-control">
                        </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label">Gambar Produk</label>
                    <div class="col-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="{{ asset('template/backend/assets/images/small/img-1.jpg')}}" alt="image" class="img-fluid" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <button type="button" class="btn btn-custom btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" class="btn-light" name="gambar" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label">Harga Produk (Rp.)</label>
                    <div class="col-6">
                        <input required name="harga" type="text" placeholder="e.g. RP. 1,500,000" data-a-sign="RP. " class="form-control autonumber">
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-3 col-form-label">Deskripsi</label>
                    <div class="col-6">
                        <textarea name="deskripsi" placeholder="e.g. Deskripsi Produk" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col--xs6 col-form-label" for="category"></label> 
                    {{-- <div class="row"> --}}
                        <div class="col-md-3 col--xs6">
                            <select required name="kategori" id="kategori" class="form-control btn-rounded">
                                <option value="">-- Kategori --</option>
                                @foreach (\App\Kategori::all() as $item)
                                    <option value="{{$item->id}}">{{$item->kategori}}</option>          
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col--xs6">
                                <input required type="number" min="0" name="stok" placeholder="Stok Produk" class="form-control">
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