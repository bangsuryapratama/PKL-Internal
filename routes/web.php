<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//basic route 
Route::get('/tentang', function () {
    return '<h1>Selamat Datang di Surya E-Commerce</h1>
            <p>Ini adalah halaman tentang kami.</p>';
});

//profile route
Route::get('/profile', function () {
    return view('profile');
});

//param 
Route::get('/produk/{p}', function ($p) {
    return "Saya membeli: " . $p;
});

//route dengan parameter kategori
Route::get('/kategori/{namaKategori}', function ($namaKategori) {
    return view ('kategori', compact('namaKategori'));
    // return view ('kategori', ['kat' => $namaKategori]);
});

//optional parameter
Route::get('/search/{keyword?}', function ($key = null) {
    return view('search', compact('key'));
});

//latihan route barang dan kode 
Route::get('/promo/{barang?}/{kode?}', function ($barang = null, $kode = null ) {
    return view('promo', compact('barang', 'kode'));
});

//route untuk controller MyController
Route::get('buku', [MyController::class, 'index'])->name('buku.index');
//create buku
Route::get('buku/create', [MyController::class, 'create'])->name('buku.create');
Route::post('buku', [MyController::class, 'store']);
//show buku
Route::get('buku/{id}', [MyController::class, 'show'])->name('buku.show');
//edit buku
Route::get('buku/{id}/edit', [MyController::class, 'edit'])->name('buku.edit');
Route::put('buku/{id}', [MyController::class, 'update'])->name('buku.update');
//destroy
Route::delete('buku/{id}', [MyController::class, 'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route untuk admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);
    // crud

    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);

});



