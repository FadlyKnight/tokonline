@extends('layouts.backend.a-navbar')
{{-- @extends('layouts.backend.b-navbar') --}}

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
                <span class="float-md-right align-content-center"><a href="#create-kategori" class="btn btn-primary" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">Tambah kategori</a></span>
                <h4 class="header-title mb-4">Data kategori</h4>
            {{-- <table 
            
                id="datatable"
                id="datatable-buttons" 
                class="table table-striped table-bordered dt-responsive nowrap" 
                style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                <table id="datatable" 
                class="table table-bordered dt-responsive nowrap" 
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kategori</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kategori as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->kategori }}</td>
                        <td>{{ $k->slug }}</td>
                        <td>
                            <a href="#custom-modal{{ $k->id }}" class="btn-sm btn-warning" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="fa fa-pencil"></i></a>
                            <br><br/>
                            <form action="{{ route('kategori.destroy', $k->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                 
                                <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    <div id="custom-modal{{ $k->id }}" class="modal-demo">
                        <button type="button" class="close" onclick="Custombox.close();">
                            <span>&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="custom-modal-title">Edit kategori</h4>
                        <div class="custom-modal-text">
                            <form class="form-horizontal" action="{{route('kategori.update', $k->id)}}" method="POST">
                                <input type="hidden" name="_method" value="PATCH">
                                @csrf
            
                                <div class="form-group m-b-25">
                                    <div class="col-12">
                                        <label for="kategori">Kategori</label>
                                        <input class="form-control" type="text" name="kategori" value="{{ $k->kategori }}" required="" placeholder="ex: Alat Elektronik">
                                    </div>
                                </div>
                    
                                <div class="form-group m-b-25">
                                    <div class="col-12">
                                        <label for="slug">Slug</label>
                                        <input class="form-control " type="text" name="slug" value="{{ $k->slug }}"  placeholder="ex: alat-elektronik">
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn w-lg btn-rounded btn-custom waves-effect waves-light" type="submit">Submit</button>
                                    </div>
                                </div>
                
                            </form>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="create-kategori" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">kategori</h4>
    <div class="custom-modal-text">
        <form class="form-horizontal" action="{{route('kategori.store')}}" method="POST">
            @csrf
            <div class="form-group m-b-25">
                <div class="col-12">
                    <label for="kategori">Kategori</label>
                    <input class="form-control" type="text" name="kategori" required="" placeholder="ex: Alat Elektronik">
                </div>
            </div>

            <div class="form-group m-b-25">
                <div class="col-12">
                    <label for="slug">Slug</label>
                    <input class="form-control " type="text" name="slug"  placeholder="ex: alat-elektronik">
                </div>
            </div>
            <div class="form-group account-btn text-center m-t-10">
                <div class="col-12">
                    <button class="btn w-lg btn-rounded btn-custom waves-effect waves-light" type="submit">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>


<!-- Custom box css -->
<link href="{{ asset('template/plugins/custombox/css/custombox.min.css')}}" rel="stylesheet">

<script src="{{ asset('template/backend/assets/js/jquery.min.js')}}"></script>

 <!-- Modal-Effect -->
 <script src="{{ asset('template/plugins/custombox/js/custombox.min.js')}}"></script>
 <script src="{{ asset('template/plugins/custombox/js/legacy.min.js')}}"></script>


@endsection