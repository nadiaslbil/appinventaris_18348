<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenerateLaporanController;
use App\Http\Controllers\KepalagudangController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PeminjamanAdminController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ValidasiPengembalianController;
use Illuminate\Support\Facades\Route;

//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/administrator', [DashbordController::class, 'admin']);
    Route::get('/dashboard', [DashbordController::class, 'admin']);
    
    Route::get('/petugas', [PetugasController::class,'index']);
    Route::get('/tambahpetugas', [PetugasController::class,'create']);
    Route::post('/storepetugas', [PetugasController::class,'store']);
    Route::get('/editpetugas{id_petugas}', [PetugasController::class,'edit']);
    Route::post('/updatepetugas', [PetugasController::class,'update']);
    Route::get('/hapuspetugas{id_petugas}', [PetugasController::class,'destroy']);

    Route::get('/anggota', [AnggotaController::class,'index']);
    Route::get('/tambahanggota', [AnggotaController::class,'create']);
    Route::post('/storeanggota', [AnggotaController::class,'store']);
    Route::get('/editanggota{id_anggota}', [AnggotaController::class,'edit']);
    Route::post('/updateanggota', [AnggotaController::class,'update']);
    Route::get('/hapusanggota{id_anggota}', [AnggotaController::class,'destroy']);

    Route::get('/inventaris', [InventarisController::class,'index']);
    Route::get('/tambahinventaris', [InventarisController::class,'create']);
    Route::post('/storeinventaris', [InventarisController::class,'store']);
    Route::get('/detailinven{id_inventaris}', [InventarisController::class,'show']);
    Route::get('/editinventaris{id_inventaris}', [InventarisController::class,'edit']);
    Route::post('/updateinventaris', [InventarisController::class,'update']);
    Route::get('/hapusinventaris{id_inventaris}', [InventarisController::class,'destroy']);

    Route::get('/ruang', [RuangController::class,'index']);
    Route::get('/tambahruang', [RuangController::class,'create']);
    Route::post('/storeruang', [RuangController::class,'store']);
    Route::get('/editruang{id_ruang}', [RuangController::class,'edit']);
    Route::post('/updateruang', [RuangController::class,'update']);
    Route::get('/hapusruang{id_ruang}', [RuangController::class,'destroy']);

    Route::get('/jenis', [JenisController::class,'index']);
    Route::get('/tambahjenis', [JenisController::class,'create']);
    Route::post('/storejenis', [JenisController::class,'store']);
    Route::get('/editjenis{id_jenis}', [JenisController::class,'edit']);
    Route::post('/updatejenis', [JenisController::class,'update']);
    Route::get('/hapusjenis{id_jenis}', [JenisController::class,'destroy']);

    Route::get('/peminjamanadmin', [PeminjamanController::class,'indexadmin']);
    Route::get('/tambahpeminjamanadmin', [PeminjamanController::class,'createadmin']);
    Route::post('/storeadmin', [PeminjamanController::class,'storeadmin']);

    Route::post('/peminjaman/{id_peminjaman}/validasi', [ValidasiPengembalianController::class, 'validasiadmin'])->name('peminjaman.validasiadmin');   
    Route::get('/pengembalianadmin', [ValidasiPengembalianController::class,'pengembalianadmin']);
    Route::post('/peminjaman/{id_peminjaman}/kembalikanadmin', [ValidasiPengembalianController::class, 'kembalikanadmin'])->name('peminjaman.kembalikanadmin');   

    Route::get('/laporanadmin', [GenerateLaporanController::class,'laporanadmin']);
    Route::get('/datalaporan', [GenerateLaporanController::class,'datalaporan']);
    Route::get('/peminjaman/pdfadmin', [GenerateLaporanController::class,'generatePdfadmin']);
});

Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/operator', [DashbordController::class, 'operator']);
    Route::get('/dashboard', [DashbordController::class, 'operator']);

    Route::get('/peminjamanoperator', [PeminjamanController::class,'indexoperator']);
    Route::get('/tambahpeminjamanoperator', [PeminjamanController::class,'createoperator']);
    Route::post('/storepeminjamanoperator', [PeminjamanController::class,'storeoperator']);
    Route::post('/peminjaman/{id_peminjaman}/kembalikanoperator', [ValidasiPengembalianController::class, 'kembalikanoperator'])->name('peminjaman.kembalikanoperator');   
});

Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/kepalagudang', [DashbordController::class, 'kepalagudang']);
    Route::get('/dashboard', [DashbordController::class, 'kepalagudang']);

    Route::get('/peminjamankp', [PeminjamanController::class,'indexkepalagudang']);
    Route::post('/peminjaman/{id_peminjaman}/validasikp', [ValidasiPengembalianController::class, 'validasikp'])->name('peminjaman.validasikp');   

    Route::get('/laporankp', [GenerateLaporanController::class,'laporankp']);
    Route::get('/datalaporankp', [GenerateLaporanController::class,'datalaporankp']);
    Route::get('/peminjaman/pdfkp', [GenerateLaporanController::class,'generatePdfkp']);
});