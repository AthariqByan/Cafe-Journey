<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }

    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'nomor' => 'required'
        ]);

        User::Where('username', $user->username)->update($validateData);

        return redirect()->back()->with('success', 'Berhasil Di Rubah');
    }
}
