<?php

namespace App\Http\Controllers;

use App\Models\DataPemasukan;
use App\Models\DataRekapTransaksi;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.pemasukan.index', [
            'pemasukan' => DataPemasukan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.pemasukan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'id_akun' => 'required',
            'nama_pemasukan' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'keterangan' => 'required'
        ];

        $validateData = $request->validate($data);
        $dataPemasukan = DataPemasukan::create($validateData);

        $dataRekap = DataRekapTransaksi::create([
            'id_pemasukan' => $dataPemasukan->id,
        ]);

        $dataPemasukan->save();
        $dataRekap->save();

        return redirect('/pemasukan/create')->with('suksesPemasukan', 'Data Pemasukan Berhasil  Ditambahkan');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('dashboard.pemasukan.edit',[
            'pemasukan' => DataPemasukan::where('id', '=', $id)->get(),
        ]);
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
        //
        $data = [
            'id_akun' => 'required',
            'nama_pemasukan' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'keterangan' => 'required'
        ];

        $validateDataUp = $request->validate($data);

        DataPemasukan::where('id', $id)
                ->update($validateDataUp);

        return redirect('/pemasukan/'.$id. '/edit')->with('suksesUp', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DataRekapTransaksi::where('id_pemasukan', $id)
                ->delete();
        DataPemasukan::where('id', $id)
                ->delete();

        
        return redirect('/pemasukan')->with('suksesHapHut', 'Data Berhasil Di Hapus');
    }
}
