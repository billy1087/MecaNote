<?php

namespace App\Http\Controllers;

use App\Models\DataPengeluaran;
use App\Models\DataRekapTransaksi;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.pengeluaran.index', [
            'pengeluaran' => DataPengeluaran::all()
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
        return view('dashboard.pengeluaran.create');
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
            'nama_pengeluaran' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'keterangan' => 'required'
        ];

        $validateData = $request->validate($data);

        DataPengeluaran::create($validateData);

        return redirect('/pengeluaran/create')->with('suksesPengeluaran', 'data Pengeluaran Berhasil Ditambahkan');
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
        return view('dashboard.pengeluaran.edit',[
            'pengeluaran' => DataPengeluaran::where('id', $id)->get()
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
            'nama_pengeluaran' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'keterangan' => 'required'
        ];

        $validateDataUp = $request->validate($data);

        DataPengeluaran::where('id', $id)
                ->update($validateDataUp);

        return redirect('/pengeluaran/'.$id. '/edit')->with('suksesUp', 'Data Berhasil Di Update');
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
        DataRekapTransaksi::where('id_pengeluaran', $id)
                ->delete();
        DataPengeluaran::where('id', $id)
                ->delete();

        
        return redirect('/pengeluaran')->with('suksesHapHut', 'Data Berhasil Di Hapus');
    }
}
