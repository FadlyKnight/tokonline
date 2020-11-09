@extends('layouts.backend.a-navbar')
{{-- @extends('layouts.backend.b-navbar') --}}


{{-- <link href="{{ asset('template/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"> --}}

<!-- Plugins css -->
{{-- <link href="{{ asset('template/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet"> --}}

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-6 offset-4">
                    <h4 class="header-title mb-4">Data Voucher Diskon</h4>
                </div>
                <div>
                    <a href="#custom-modal" class="btn btn-primary btn-rounded waves-light waves-effect w-md mr-2 mb-2" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">New Voucher</a>
                </div>
            </div>
            
                {{-- <div class="form-group">
                    <label>Auto Close</label>
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            <table 
                id="datatable"
                {{-- id="datatable-buttons"  --}}
                class="table table-striped table-bordered dt-responsive nowrap" 
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Total Diskon</th>
                        <th>Kode Diskon</th>
                        <th>Status Diskon</th>
                        <th>Expried Disc</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($diskon as $disc)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $disc->jumlah_diskon }}</td>
                        <td>
                            {{ $disc->kode_diskon }}
                        </td>
                        <td>
                            {{ $disc->status_diskon }} Digunakan
                        </td>
                        <td>{{ $disc->expired }}</td>
                        <td>
                            <a href="#custom-modal{{ $disc->id }}" class="btn-sm btn-warning" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="fa fa-pencil"></i></a>
                            <br><br/>
                            <form action="{{ route('diskon.destroy', $disc->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                 
                                <button type="submit" class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    <div id="custom-modal{{ $disc->id }}" class="modal-demo">
                            <button type="button" class="close" onclick="Custombox.close();">
                                <span>&times;</span><span class="sr-only">Close</span>
                            </button>
                            <h4 class="custom-modal-title">Edit Voucher</h4>
                            <div class="custom-modal-text">
                                <form class="form-horizontal" action="{{route('diskon.update', $disc->id)}}" method="POST">
                                    <input type="hidden" name="_method" value="PATCH">
                                    @csrf
                
                                    <div class="form-group m-b-25">
                                        <div class="col-12">
                                            <label for="Jumlah_diskon">Total Diskon</label>
                                            <input class="form-control" value="{{ $disc->jumlah_diskon }}" type="number" name="jumlah_diskon" required="" placeholder="RP. 20.000,00">
                                        </div>
                                    </div>
                    
                                    <div class="form-group m-b-25">
                                        <div class="col-12">
                                            <a href="#" class="text-muted float-right font-14 randomklik">Random Text Here</a>
                                            <label for="kode_diskon">Kode Voucher</label>
                                            <input class="form-control kode_diskon" type="text" value="{{ $disc->kode_diskon }}" name="kode_diskon" maxlength="6" required=""  placeholder="CODEHERE">
                                        </div>
                                    </div>
                
                                    @php
                                      $expired =  date('m/d/Y', strtotime($disc->expired));
                                    @endphp
                                    <div class="form-group m-b-25">
                                        <div class="col-12">
                                            <label for="expired">Expired Voucher</label>
                                            <input type="date" value="{{ $expired }}" name="expired" class="form-control datepicker-custom" placeholder="mm/dd/yyyy">
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
                
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>

            
    <div id="custom-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Add New Voucher</h4>
            <div class="custom-modal-text">
                <form class="form-horizontal" action="{{route('diskon.store')}}" method="POST">
                    @csrf

                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="Jumlah_diskon">Total Diskon</label>
                            <input class="form-control" type="number" id="Jumlah_diskon" name="jumlah_diskon" required="" placeholder="RP. 20.000,00">
                        </div>
                    </div>
    
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <a href="#" id="randomklik3" class="text-muted float-right font-14">Random Text Here</a>
                            <label for="kode_diskon3">Kode Voucher</label>
                            <input class="form-control" type="text" name="kode_diskon" maxlength="6" required="" id="kode_diskon3" placeholder="CODEHERE">
                        </div>
                    </div>

                    
                    <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="expired">Expired Voucher</label>
                            <input type="date" name="expired" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" >
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

        </div>
    </div>
</div>


<!-- Custom box css -->
<link href="{{ asset('template/plugins/custombox/css/custombox.min.css')}}" rel="stylesheet">

<script src="{{ asset('template/backend/assets/js/jquery.min.js')}}"></script>

 <!-- Modal-Effect -->
 <script src="{{ asset('template/plugins/custombox/js/custombox.min.js')}}"></script>
 <script src="{{ asset('template/plugins/custombox/js/legacy.min.js')}}"></script>



 <script>
    jQuery(document).ready(function () {

        jQuery('.datepicker-custom').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    });
 </script>
<script>
$(document).ready(function() {
    
    $("#randomklik3").click(function(){
        
        function makeid(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        var ran = makeid(6);

        $("#kode_diskon3").val(ran);
    });

    $(".randomklik").click(function(){
        
        function makeid(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        var ran = makeid(6);

        $(".kode_diskon").val(ran);
    });
});
 </script>
@endsection

