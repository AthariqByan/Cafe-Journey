<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Http\Request;

class BuatCafeController extends Controller
{
    public function index()
    {
        $this->authorize('bukan_admin');
        $domisili = ['Kota Tegal', 'Kab Tegal'];
        $kecamatan =  [
            'margasari', 'bumijawa', 'bojong', 'balapulang', 'pagerbarang',
            'lebaksiu', 'jatinegara', 'kedungbanteng', 'pangkah', 'slawi', 'dukuhwaru', 'adiwerna',
            'dukuhturi', 'talang', 'tarub', 'kramat', 'suradadi', 'warureja', 'margadana',
            'tegal barat', 'tegal selatan', 'tegal timur'
        ];

        return view('cafe.daftar.index', [
            'domisili' => $domisili,
            'kecamatan' => $kecamatan
        ]);
    }
    public function store(Request $request)
    {
        $this->authorize('bukan_admin');
        $slug = strtolower($request->nama_cafe) . " " . substr(md5(time()), 0, 6);
        $validasiData = $request->validate([
            'nama_cafe' => 'required',
            'no_telepon' => 'required|min:9|max:25',
            'alamat' => 'required|max:255',
            'domisili' => 'required',
            'kecamatan' => 'required'
        ]);

        $validasiData['slug'] = str_replace(" ", "-", $slug);
        $validasiData['user_id'] = auth()->user()->id;

        Cafe::create($validasiData);

        return redirect('/dashboard/cafe')->with('success', 'Berhasil Di Tambah');
    }
}
