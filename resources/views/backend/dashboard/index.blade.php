@extends('layouts.backend.a-navbar')

@section('forstyle')
{{-- 
        <!-- DataTables -->
        <link href="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('template/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Multi Item Selection examples -->
        <link href="{{ asset('template/plugins/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> --}}

<link href="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        
@endsection
        
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Account Overview</h4>

            <div class="row">
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two bg-primary text-white">
                        
                        <div class="widget-chart-two-content">
                            <p class="text-white mb-0 mt-2">Pemasukan Harian</p>
                            <h3 class="">RP. {{ $data->hari->sum('total_harga') }}</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two bg-success text-white">
                        
                        <div class="widget-chart-two-content">
                            <p class="text-white mb-0 mt-2">Pemasukan Bulanan</p>
                            <h3 class="">Rp. {{ $data->bulan->sum('total_harga') }}</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two bg-warning text-white">
                        
                        <div class="widget-chart-two-content">
                            <p class="text-white mb-0 mt-2">Jumlah User</p>
                            <h3 class="">{{ \DB::table('users')->where('role', 'Members')->count() }}</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two bg-pink text-white">
                        
                        <div class="widget-chart-two-content">
                            <p class="text-white mb-0 mt-2">Jumlah Produk</p>
                            <h3 class="">{{ \DB::table('produk')->count() }}</h3>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Tabel Order Hari Ini</h4>
            
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" 
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Jam Pemesanan</th>
                <th>Nama</th>
                <th style="width: 10% !important;">Alamat Kirim</th>
                <th>Total</th>
                <th>Status Pemesanan</th>
            </tr>
        </thead>
        <tbody>
            
                @foreach ($data->hari->whereNotNull('status_pesan')->get() as $i => $pemesanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                  
                    <td>{{ date('H:i', strtotime($pemesanan->created_at)) }}</td>
                    <td>{{ $pemesanan->user->name }} </td>
                    <td>
                        {{ $pemesanan->alamat['daerah'] }} 
                        <br>
                        <small>{{ $pemesanan->alamat->detail  }}</small>
                    </td>
                    
                    <td>{{ $pemesanan->total_harga }}
                    <br><span style="font-size: 8pt;">Kode Pembayaran :</span> {{ $pemesanan->kode_verifikasi }}
                    </td>
                    <td>{{ $pemesanan->status_pesan }}</td>
                    
                </tr>
            @endforeach
        </tbody>
</table>
        </div>
    </div>
</div>

@endsection

@section('forscript')

        <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        {{-- <!-- Buttons examples -->
        <script src="{{ asset('template/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables/buttons.print.min.js') }}"></script> --}}

        <!-- Key Tables -->
        {{-- <script src="{{ asset('template/plugins/datatables/dataTables.keyTable.min.js') }}"></script> --}}

        <!-- Responsive examples -->
        <script src="{{ asset('template/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
{{-- 
        <!-- Selection table -->
        <script src="{{ asset('template/plugins/datatables/dataTables.select.min.js') }}"></script> --}}


        {{-- <script src="{{ asset('template/plugins/jquery-knob/jquery.knob.js') }}"></script> --}}
<script>
    
                //Buttons examples
                var table = $('#datatable-buttons').DataTable();
// $(document).ready(function() {
//     $('#datatable').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             'excel'
//         ]
//     } );
// } );
</script>
@endsection