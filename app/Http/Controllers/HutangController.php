<?php

namespace App\Http\Controllers;

use App\Models\DataHutang;
use App\Models\DataRekapTransaksi;
use Illuminate\Http\Request;

class HutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.hutang.index', [
            'hutang' => DataHutang::all()
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
        return view('dashboard.hutang.create');
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
            'nama_hutang' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'keterangan' => 'required'
        ];

        $validateData = $request->validate($data);
        $dataHutang = DataHutang::create($validateData);

        $dataRekap = DataRekapTransaksi::create([
            'id_hutang' => $dataHutang->id,
        ]);

        $dataHutang->save();
        $dataRekap->save();

        return redirect('/hutang/create')->with('suksesHutang', 'Data Hutang Berhasil Ditambahkan');
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
        return view('dashboard.hutang.edit', [
            'hutang' => DataHutang::where('id', '=', $id)->get(),
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
            'nama_hutang' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'keterangan' => 'required'
        ];

        $validateDataUp = $request->validate($data);

        DataHutang::where('id', $id)
                ->update($validateDataUp);

        return redirect('/hutang/'.$id. '/edit')->with('suksesUp', 'Data Berhasil Di Update');
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
        DataRekapTransaksi::where('id_hutang', $id)
                ->delete();
        DataHutang::where('id', $id)
                ->delete();

        
        return redirect('/hutang')->with('suksesHapHut', 'Data Berhasil Di Hapus');
    }
}
