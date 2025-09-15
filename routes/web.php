<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DispoController;


Route::get('/', [ChartController::class, 'index'])->name('home.index')->middleware('auth');
Route::get('/home', [ChartController::class, 'index'])->name('home.index')->middleware('auth');

// Route::get('/', function () {
//     //return view('welcome');
//     return view('app',['title' => 'Home']);
// })->middleware('auth');

Route::resource('memo', MemoController::class);
Route::resource('register', RegisterController::class);
//Route::resource('dispo', DispoController::class);
Route::resource('dashboard', DashboardController::class);
Route::resource('dispo', DispoController::class);

//Dispossisi
Route::get('/kotakKeluarPim', [DispoController::class, 'kotakKeluarPim'])->name('dispo.kotakKeluarPim');

//Route::post('/selesaiDispo', [DispoController::class, 'selesaiDispo'])->name('selesaiDispo');
//Route::post('/selesaiDispo', [DashboardController::class, 'sendWa'])->name('selesaiDispo');
Route::post('/selesaiDispo', [DashboardController::class, 'send'])->name('selesaiDispo');

//tracking
Route::get('/tracking/{id}', [DispoController::class, 'tracking'])->name('tracking');
Route::get('/search', [DispoController::class, 'search'])->name('search');

//tracking menu
Route::get('/tracking', function () {
    
    return view('tracking',['title' => 'Tracking']);
});


//simpan memo
Route::get('/kotakMasuk', [MemoController::class, 'index'])->name('memo.index');
Route::get('/kotakKeluar', [MemoController::class, 'kotakKeluar'])->name('memo.kotakKeluar');
Route::get('/kotakKeluarDispo', [DispoController::class, 'kotakKeluar'])->name('dispo.kotakKeluar');
Route::get('/memo/{file}/download', [MemoController::class, 'download'])->name('memo.download');

Route::get('/view-pdf/{id}', [MemoController::class, 'viewPDF'])->name('view-pdf');


Route::get('/createUser', [RegisterController::class, 'create'])->name('user.create');
Route::get('/dataUser', [RegisterController::class, 'index'])->name('user.index');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
//logout
Route::post('/logout', [LoginController::class, 'logout']);




Route::post('/storeInstansi', [InstansiController::class, 'store']);
Route::post('/storeJabatan', [JabatanController::class, 'store']);






// Route::get('/home', function () {
    
//     return view('app',['title' => 'Home']);
// });

Route::get('/buatMemo', function () {
    
    return view('buatMemo',['title' => 'Buat Memo']);
});

// Route::get('/kotakMasuk', function () {
    
//     return view('kotakMasuk',['title' => 'Kotak Masuk']);
// });







 Route::get('/disposisi', function () {
    
     return view('disposisi',['title' => 'Disposisi Pimpinan']);
 });



Route::get('/memoumum', function () {
    
    return view('memoUmum',['title' => 'Memo Umum']);
});


