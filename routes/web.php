<?php

use App\Models\Cafe;
use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VipController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BuatCafeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfilCafeController;
use App\Http\Controllers\DashboardBeliController;
use App\Http\Controllers\DashboardMinumController;
use App\Http\Controllers\DashboardBookingController;
use App\Http\Controllers\AnalitikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', function () {

    return view('index', [
        'cafes' => Cafe::latest()->cari(request('cari'))->get()
    ]);
});

Route::get('/cafe/{cafe:slug}', [CafeController::class, 'profil']);
Route::get('/cafe/menu/{cafe:slug}', [CafeController::class, 'menu']);
Route::post('/cafe/menu/{cafe:slug}', [CafeController::class, 'menu']);
Route::get('/cafe/booking/{cafe:slug}', [CafeController::class, 'booking']);
Route::get('/cafe/ulasan/{cafe:slug}', [CafeController::class, 'ulasan']);



// Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register/create', [RegisterController::class, 'create'])->middleware('guest');

// Route::post('/authenticate', [LoginController::class, 'authenticate']);
// Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth');
Route::put('/profil/{user:username}', [ProfilController::class, 'update'])->middleware('auth');

Route::get('/beli/draf', [BeliController::class, 'draf']);
Route::delete('/beli/destroy-pesanan/{beli:id}', [BeliController::class, 'destroyPesanan']);
Route::resource('/beli', BeliController::class);

Route::post('/rating', [RatingController::class, 'store']);

Route::resource('booking', BookingController::class);

Route::get('/daftar-cafe', [BuatCafeController::class, 'index'])->middleware('auth');;
Route::post('/daftar-cafe', [BuatCafeController::class, 'store'])->middleware('auth');;
Route::resource('/dashboard/cafe', ProfilCafeController::class)->middleware(['auth', 'verified'])->middleware('admin');
Route::resource('/dashboard/minum', DashboardMinumController::class)->middleware('auth')->middleware('admin');
Route::resource('/dashboard/makanan', MakananController::class)->middleware('auth')->middleware('admin');
Route::resource('/dashboard/vip', VipController::class)->middleware('auth')->middleware('admin');
Route::resource('/dashboard/foto', FotoController::class)->middleware('auth')->middleware('admin');
Route::resource('/dashboard/event', EventController::class)->middleware('auth')->middleware('admin');
Route::put('/dashboard/jadwal/{jadwal}', [JadwalController::class, 'update'])->middleware('admin');
Route::get('/dashboard/booking', [DashboardBookingController::class, 'index'])->middleware('admin');
Route::put('/dashboard/booking/{booking}', [DashboardBookingController::class, 'update'])->middleware('admin');
Route::get('/dashboard/beli/', [DashboardBeliController::class, 'index'])->middleware('auth')->middleware('admin');
Route::get('/dashboard/analis', [AnalitikController::class, 'index'])->middleware('auth')->middleware('admin');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Auth::routes(['verify' => true]);
require __DIR__ . '/auth.php';
