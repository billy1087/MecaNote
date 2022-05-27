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

        $bulan = DB::table('data_rekap_transaksis')->select(DB::raw('YEAR(updated_at) AS tahun, MONTHNAME(updated_at) AS bulan'))->groupBy('bulan', 'tahun')->orderByDesc('tahun', 'bulan')->get();

        $pemasukan = DB::table('data_pemasukans')->select(DB::raw("SUM(jumlah * harga_satuan) AS pemasukan"))->groupBy(DB::raw("MONTH(updated_at)"), DB::raw("YEAR(updated_at)"))->get();

        $piutang = DB::table('data_piutangs')->select(DB::raw("SUM(jumlah * harga_satuan) AS piutang"))->groupBy(DB::raw("MONTH(updated_at)"), DB::raw("YEAR(updated_at)"))->get();

        $pengeluaran = DB::table('data_pengeluarans')->select(DB::raw("SUM(jumlah * harga_satuan) AS pengeluaran"))->groupBy(DB::raw("MONTH(updated_at)"), DB::raw("YEAR(updated_at)"))->get();

        $hutang = DB::table('data_hutangs')->select(DB::raw("SUM(jumlah * harga_satuan) AS hutang"))->groupBy(DB::raw("MONTH(updated_at)"), DB::raw("YEAR(updated_at)"))->get();

        return view('dashboard.rekap.index', [
            'pemasukan' => $pemasukan,
            'piutang' => $piutang,
            'pengeluaran' => $pengeluaran,
            'hutang' => $hutang,
            'blnth' => $bulan,
            'rekapPemasukan' => $pemasukanRekap,
            'rekapPiutang' => $piutangRekap,
            'rekapPengeluaran' => $pengeluaranRekap,
            'rekapHutang' => $hutangRekap,
        ]);
    }

}
