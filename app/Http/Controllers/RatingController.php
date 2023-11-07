<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'rating' => 'required',
            'ulasan' => 'max:255',
            'cafe_id' => 'required',
            'user_id' => 'required'
        ]);

        Ulasan::create($validasiData);

        return redirect()->back()->with('success', 'Terima Kasih Sudah Memberikan Ulasan');
    }
}
