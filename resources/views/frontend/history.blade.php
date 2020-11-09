@extends('layouts.frontend.stylecss')
@section('content')

<style>

    /* @media (max-width: 991px) {
    .profile_toggle { bottom: 40px; right: 350px !important; }
    }

    .profile_toggle {
        right: 1200px ;
    } */

    .profile_toggle > a {
        background-color: #1FA12E !important;
    }

	.signup_wrapper > .signup_inner > .signup_details::before {
		background-color: #1FA12E !important;
	}

	.signup_wrapper > .signup_inner > .signup_details > .clv_btn::before {
    	color: #1fa12e !important;
	}

	.masuk > a  {
		color: #1fa12e !important ;
	}

	.signin_wrapper > .signup_inner > .signup_details::before {
		background-color: #1FA12E !important;
		/* margin-top: 20px !important; */
	}

	.signin_wrapper > .signup_inner > .signup_details > .clv_btn::before {
    	color: #1fa12e !important;
	}

	.index_v3 .clv_right_header .clv_menu .clv_menu_nav > ul > li > a {
		color: #222222;
	}
	
	.index_v3 .clv_right_header .clv_menu .clv_menu_nav > ul > li > a:hover {
		color: #1FA12E;
	}

	.org_product_block a:hover {
		background-color: #1FA12E;
	}

	.contact_blocks_wrapper {
		/* background-color: #ffffff; */
		padding-top: 125px !important;
	}

	.kosong{
		background-color: red !important;
	}

	/* .org_product_block a {
		color: #ffffff  !important;
		background-color: #222222 !important;
	} */

	/* .signup_wrapper > .signup_inner > .signup_details > .clv_btn::after {
    	color: #FFF !important;
	} */

	/* .signup_wrapper > .signup_inner > .signup_form_section > .clv_btn::before {
		background-color: #1fa12e !important;
	} */

	/* .signup_wrapper > .signup_inner > .signup_form_section > .clv_btn::after {
		color: #1fa12e !important;
		border-color: #1FA12E !important;
	}  */

    .breadcrumb_block ul li:before, .breadcrumb_block ul li:after {
        content: " | ";
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translateY(-50%);
    }

    .user_profile_wrapper {
    padding-top: 100px;
    }
</style>
	
<div class="clv_main_wrapper index_v3">
    {{-- Header --}}
    @include('layouts.frontend.header2')
    @include('layouts.frontend.lay_akun')
<!--User Profile-->
<div class="user_profile_wrapper clv_section">
    <div class="container">
        <div class="user_profile_section">
            <div class="checkout_heading">
                <h3>History Pemesanan</h3>

            </div>
            <div class="profile_form">
                    <div class="table-responsive">          
                            <table class="table">
                              <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Pengiriman Ke</td>
                                    <td>Total Pembayaran</td>
                                    <td>Status Pemesanan</td>
                                    <td>Action</td>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($pemesanan as $p)
                                  <tr>
                                    @php
                                        $total_bayar = $p->total_harga;
                                        $total_ongkir = 0;
                                        $kode_ver = $p->kode_verifikasi;
                                        
                                        $combine = $total_bayar + $total_ongkir + $kode_ver;

                                        $harga_rp = strrev(implode('.',str_split(strrev(strval($combine)),3)))
                                    @endphp

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->alamat->detail }} 
                                    <br>
                                    ( {{ $p->alamat->daerah }} )
                                    </td>
                                    <td>
                                        Rp. {{ $harga_rp }}
                                    </td>
                                    <td>
                                        @if ( $p->status_pesan == 'Default' )
                                        <span class="badge badge-warning">Pending</span>
                                            
                                        @elseif( $p->status_pesan == 'Diterima' )
                                        <span class="badge badge-success text-white">Sukses</span>
                                        
                                        @else
                                        <span class="badge badge-danger text-white">Gagal</span>
                                        
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <form action="{{ route('history.sampah', $p->id) }}" method="POST">
                                                @csrf
                                                <a style="border: 0;" class="btn-sm btn-primary text-white" data-toggle="modal" data-target="#myModal{{$p->id}}"><i class="fa fa-eye"></i></a>
                                                {{-- <button style="border: 0;" type="submit" class="btn-sm btn-danger text-white"><i class="fa fa-trash-o"></i></button> --}}
                                            </form>
                                        </div>
                                    </td>
                                  </tr>

                                     <!-- Modal -->
                                <div id="myModal{{$p->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                      
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              {{-- <h4 class="modal-title">Modal Header</h4> --}}
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="row">
                                                            <span class="col-3">Nama</span>
                                                            <span class="col-3">Jumlah</span>
                                                            <span class="col-3">Harga</span>
                                                            <span class="col-3">Sub Harga</span>
                                                    <hr>
                                                    @foreach ( $keranjang->where('pemesanan_id', $p->id ) as $key => $k)
                                                            <span class="col-3">{{ $k->produk->nama_produk }}  </span>
                                                            <span class="col-3">{{ $k->jumlah }} </span>
                                                            <span class="col-3">{{ $k->produk->harga}} </span>
                                                            <span class="col-3">{{ $k->produk->harga*$k->jumlah }} </span>
                                                    @endforeach
                                                    </div>
                                                        <br>
                                                </div>
                                                
                                                <span>KODE VERIFIKASI PEMBAYAAN: {{ $p->kode_verifikasi }}</span> <br>
                                                <small>Silahkan Bayar Invoice anda ke BANK XXX Ke no Rek 911-420-666 dalam waktu 1x24Jam</small>
                                                <p>Kami akan kengkonfirmasi Pembayaran Anda</p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                      
                                        </div>
                                    </div>
                                  @endforeach
                              </tbody>
                              {{-- <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <td>Pengiriman Ke</td>
                                        <td>Diskon</td>
                                        <td>Total Pembayaran</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                              </tfoot> --}}
                            </table>
                    </div>
            </div>
        </div>
    </div>
</div>


<div class="clv_footer_wrapper clv_section">	
    <!--Copyright-->
    <div class="clv_copyright_wrapper">
        <p>copyright &copy; 2019 <a href="javascript:;">Giga.</a> all right reserved.</p>
    </div>
</div>
<!--Footer-->

</div>
@endsection