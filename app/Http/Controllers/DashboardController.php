<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function rekapTransaksi()
    {
        $kemarin = Carbon::yesterday();
        $hariini = Carbon::now();
        $harian = Pemesanan::whereBetween('created_at', [$kemarin, $hariini]);

        $bulanIni = date('m');
        $bulanan = Pemesanan::whereMonth('created_at', '=',$bulanIni);

        $data = collect();
        $data->bulan = $bulanan;
        $data->hari = $harian;

        return view('backend.dashboard.index', compact('data'));
    }
}
