<?php

namespace App\Http\Controllers;

use App\Models\DataPemasukan;
use App\Models\DataRekapTransaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(request()->bulan){
            $bln = Carbon::parse(request()->bulan)->format('m');
            $thn = Carbon::parse(request()->bulan)->format('Y');
            $pemasukanRekap = DB::table('data_pemasukans')->select(DB::raw("SUM(jumlah * harga_satuan) AS pemasukan"))->whereMonth("updated_at", "=", $bln)->whereYear("updated_at", "=", $thn)->get();
            $piutangRekap = DB::table('data_piutangs')->select(DB::raw("SUM(jumlah * harga_satuan) AS piutang"))->whereMonth("updated_at", "=", $bln)->whereYear("updated_at", "=", $thn)->get();
            $pengeluaranRekap = DB::table('data_pengeluarans')->select(DB::raw("SUM(jumlah * harga_satuan) AS pengeluaran"))->whereMonth("updated_at", "=", $bln)->whereYear("updated_at", "=", $thn)->get();
            $hutangRekap = DB::table('data_hutangs')->select(DB::raw("SUM(jumlah * harga_satuan) AS hutang"))->whereMonth("updated_at", "=", $bln)->whereYear("updated_at", "=", $thn)->get();
        } else{
            $pemasukanRekap = DB::table('data_pemasukans')->select(DB::raw("SUM(jumlah * harga_satuan) AS pemasukan"))->whereMonth("updated_at", "=", Carbon::now())->whereYear("updated_at", "=", Carbon::now())->get();
            $piutangRekap = DB::table('data_piutangs')->select(DB::raw("SUM(jumlah * harga_satuan) AS piutang"))->whereMonth("updated_at", "=", Carbon::now())->whereYear("updated_at", "=", Carbon::now())->get();
            $pengeluaranRekap = DB::table('data_pengeluarans')->select(DB::raw("SUM(jumlah * harga_satuan) AS pengeluaran"))->whereMonth("updated_at", "=", Carbon::now())->whereYear("updated_at", "=", Carbon::now())->get();
            $hutangRekap = DB::table('data_hutangs')->select(DB::raw("SUM(jumlah * harga_satuan) AS hutang"))->whereMonth("updated_at", "=", Carbon::now())->whereYear("updated_at", "=", Carbon::now())->get();
        }

        $trans = DB::table('data_rekap_transaksis')
        ->leftJoin('data_pemasukans', 'data_pemasukans.id', '=', 'data_rekap_transaksis.id_pemasukan')
        ->leftJoin('data_piutangs', 'data_piutangs.id', '=', 'data_rekap_transaksis.id_piutang')
        ->leftJoin('data_pengeluarans', 'data_pengeluarans.id', '=', 'data_rekap_transaksis.id_pengeluaran')
        ->leftJoin('data_hutangs', 'data_hutangs.id', '=', 'data_rekap_transaksis.id_hutang')
        ->select(DB::raw('MONTHNAME(data_rekap_transaksis.updated_at) AS bulan, YEAR(data_rekap_transaksis.updated_at) AS tahun, SUM(data_pemasukans.jumlah * data_pemasukans.harga_satuan) AS pemasukan, SUM(data_pengeluarans.jumlah * data_pengeluarans.harga_satuan) AS pengeluaran, SUM(data_hutangs.jumlah * data_hutangs.harga_satuan) AS hutang, SUM(data_piutangs.jumlah * data_piutangs.harga_satuan) AS piutang'))
        ->groupBy(DB::raw('MONTH(data_rekap_transaksis.updated_at)'))->get();

        return view('dashboard.rekap.index', [
            'transaksi' => $trans,
            'rekapPemasukan' => $pemasukanRekap,
            'rekapPiutang' => $piutangRekap,
            'rekapPengeluaran' => $pengeluaranRekap,
            'rekapHutang' => $hutangRekap,
        ]);
    }

}
