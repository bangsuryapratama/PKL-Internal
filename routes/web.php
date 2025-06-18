<?php

use Illuminate\Support\Facades\Route;

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