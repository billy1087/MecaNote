<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('registrasi');
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
            'nama' => 'required',
            'no_telepon' => 'required|max:12',
            'password' => 'required|min:6',
            'email' => 'required|email:rfc,dns|unique:users,email',
        ];


        $validateData = $request->validate($data);

        $validateData['password'] = Hash::make($request->password);

        User::create($validateData);
        return view('/login');
    }
}
