<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Beli;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class CafeController extends Controller
{

    public function profil(Cafe $cafe)
    {

        if (isset(auth()->user()->id)) {
            if ($cafe->ulasan->where('user_id', auth()->user()->id)->first() !== null) {
                $ulasan = $cafe->ulasan->where('user_id', auth()->user()->id)->first();
            } else {
                $ulasan = 'p';
            }
        } else {
            $ulasan = 'p';
        };

        $ulasans = $cafe->ulasan->take(2);
        $semua = $cafe->ulasan;
        $events = $cafe->event;


        return view('cafe.index', [
            'cafes' => $cafe,
            'ulasan' => $ulasan,
            'ulasans' => $ulasans,
            'semua' => $semua,
            'fotos' => $cafe->foto,
            'events' => $events
        ]);
    }

    public function menu(Cafe $cafe)
    {


        $beli = Beli::get();

        $semua = $cafe->ulasan;
        return view('cafe.menu', [
            'cafe' => $cafe,
            'cafes' => $cafe,
            'minumans' => $cafe->minum,
            'makanans' => $cafe->makanan,
            'semua' =>   $semua,
            'beli' => $beli
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function booking(Cafe $cafe)
    {

        return view('cafe.booking', [
            'cafe' => $cafe,
            'cafes' => $cafe,
            'bookings' => $cafe->vip,
            'semua' =>  $cafe->ulasan
        ]);
    }

    public function ulasan(Cafe $cafe)
    {
        $ulasans = $cafe->ulasan;
        return view('cafe.ulasan', [
            'cafe' => $cafe,
            'cafes' => $cafe,
            'bookings' => $cafe->vip,
            'ulasans' => $ulasans,
            'semua' =>   $cafe->ulasan

        ]);
    }
}
