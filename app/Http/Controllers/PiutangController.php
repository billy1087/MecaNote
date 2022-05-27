<?php

namespace App\Http\Controllers;

use App\Models\DataPiutang;
use App\Models\DataRekapTransaksi;
use Illuminate\Http\Request;

class PiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.piutang.index', [
            'piutang' => DataPiutang::all(),
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
        return view('dashboard.piutang.create');
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
            'nama_piutang' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'keterangan' => 'required'
        ];

        $validateData = $request->validate($data);

        DataPiutang::create($validateData);

        return redirect('/piutang/create')->with('suksesPiutang', 'Data Piutang Berhasil Ditambahkan');
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
        return view('dashboard.piutang.edit',[
            'piutang' => DataPiutang::where('id', $id)->get()
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
            'nama_piutang' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'keterangan' => 'required'
        ];

        $validateDataUp = $request->validate($data);

        DataPiutang::where('id', $id)
                ->update($validateDataUp);

        return redirect('/piutang/'.$id. '/edit')->with('suksesUp', 'Data Berhasil Di Update');
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
        DataRekapTransaksi::where('id_piutang', $id)
        ->delete();
        DataPiutang::where('id', $id)
        ->delete();


return redirect('/piutang')->with('suksesHapHut', 'Data Berhasil Di Hapus');
    }
}
