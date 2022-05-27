<?php

namespace App\Http\Controllers;

use App\Models\DataPanduan;
use Illuminate\Http\Request;

class PanduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.panduan.index',[
            'panduan' => DataPanduan::all()
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
        return view('dashboard.panduan.create');
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
            'judul_panduan' => 'required',
            'isi_panduan' => 'required'
        ];

        $validateData = $request->validate($data);

        DataPanduan::create($validateData);

        return redirect('/panduan')->with('suksesCreated', 'Data Panduan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('dashboard.panduan.detail', [
            'panduan' => DataPanduan::where('id', $id)->get()
        ]);
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
        return view('dashboard.panduan.edit', [
            'panduan' => DataPanduan::where('id', $id)->get()
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
            'judul_panduan' => 'required',
            'isi_panduan' => 'required'
        ];

        $validateData = $request->validate($data);

        DataPanduan::where('id', $id)
                ->update($validateData);

        return redirect('/panduan/' .$id)->with('suksesUp', 'Data Berhasil Di Update');
    }
}
