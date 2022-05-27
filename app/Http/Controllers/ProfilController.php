<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('dashboard.profil.edit', [
            'profil' => User::where('id', $id)->get()
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

        $user = User::where('id', auth()->user()->id)->get();

        foreach($user as $usr){
            $pass = $usr->password;
            $id = $usr->id;
            $email = $usr->email;
        }

        $data = [
            'nama' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'no_telepon' => 'required'
        ];

        if($request->email != $email){
            $data['email'] = 'required|email:rfc|unique:users,email';
        }

        $validateData = $request->validate($data);

        if($request->password == null){
            $validateData['password'] = $pass;
        } else{
            $passwordBaru = Hash::make($request->password);
            $validateData['password'] = $passwordBaru;
        }

        User::where('id', $id)
                ->update($validateData);

        return redirect('/profil/' .auth()->user()->id. '/edit')->with('suksesUp', 'Data Berhasil Di Update');
    }
}
