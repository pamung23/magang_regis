<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\Mahas\SuratmahController;
use App\Http\Controllers\Mahas\HomeController;
use App\Http\Controllers\Home2Controller;
use App\Http\Controllers\kaprodi\SuratkapController;
use App\Http\Controllers\kaprodi\Perusahaan1Controller;
use App\Http\Controllers\kaprodi\Home1Controller;
use App\Http\Controllers\WadirController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'LoginAkademik'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'storeAkademik'])->name('store.admin.login');
    Route::post('/logout', [LoginController::class, 'logoutAkademik'])->name('admin.logout');

    Route::middleware('auth:akademik')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::get('/dashboard', Home2Controller::class)->name('admin.dashboard');
        Route::prefix('perusahaan')->group(function () {
            Route::get('/', [PerusahaanController::class, 'index'])->name('admin.perusahaan.index');
            Route::get('/create', [PerusahaanController::class, 'create'])->name('admin.perusahaan.create');
            Route::post('/store', [PerusahaanController::class, 'store'])->name('admin.perusahaan.store');
            Route::get('/edit/{id}', [PerusahaanController::class, 'edit'])->name('admin.perusahaan.edit');
            Route::put('/update/{id}', [PerusahaanController::class, 'update'])->name('admin.perusahaan.update');
            Route::delete('/destroy/{id}', [PerusahaanController::class, 'destroy'])->name('admin.perusahaan.destroy');
        });
        Route::resource('jurusan', JurusanController::class);
        Route::resource('prodi', ProdiController::class);
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('wadir', WadirController::class);
        Route::resource('surat', SuratController::class);
        Route::put('setuju/{id}', [App\Http\Controllers\SuratController::class, 'setuju'])->name('akademik.setuju');
        Route::post('surat/update-wadir', [SuratController::class, 'updateWadir'])->name('surat.updateWadir');
        Route::prefix('surat')->group(function () {
            Route::resource('index', SuratController::class);
            Route::get('/print/{surat}', [SuratController::class, 'print'])->name('surat.print');
            Route::get('/view-pdf/{surat}', [SuratController::class, 'viewPDF'])->name('surat.view');
        });
    });
});

Route::prefix('kaprodi')->group(function () {
    Route::get('/login', [LoginController::class, 'LoginKaprodi'])->name('kaprodi.login');
    Route::post('/login', [LoginController::class, 'storeKaprodi'])->name('kaprodi.login.submit');
    Route::post('/logout', [LoginController::class, 'logoutKaprodi'])->name('kaprodi.logout');
    Route::middleware('auth:kaprodi')->group(function () {
        Route::get('/', [Home1Controller::class, 'index'])->name('kaprodi.dashboard');
        Route::get('/dashboard', [Home1Controller::class, 'index'])->name('kaprodi.dashboard');
        Route::get('pendaftaran', [App\Http\Controllers\kaprodi\SuratkapController::class, 'index'])->name('kaprodi.suratkap.index');
        Route::put('setuju/{id}', [App\Http\Controllers\kaprodi\SuratkapController::class, 'setuju'])->name('kaprodi.setuju');
        Route::put('tolak/{id}', [App\Http\Controllers\kaprodi\SuratkapController::class, 'tolak'])->name('kaprodi.tolak');
        Route::prefix('perusahaan')->group(function () {
            Route::get('/', [App\Http\Controllers\kaprodi\Perusahaan1Controller::class, 'index'])->name('kaprodi.perusahaan.index');
            Route::get('/create', [App\Http\Controllers\kaprodi\Perusahaan1Controller::class, 'create'])->name('kaprodi.perusahaan.create');
            Route::post('/store', [App\Http\Controllers\kaprodi\Perusahaan1Controller::class, 'store'])->name('kaprodi.perusahaan.store');
            Route::get('/edit/{id}', [App\Http\Controllers\kaprodi\Perusahaan1Controller::class, 'edit'])->name('kaprodi.perusahaan.edit');
            Route::put('/update/{id}', [App\Http\Controllers\kaprodi\Perusahaan1Controller::class, 'update'])->name('kaprodi.perusahaan.update');
            Route::delete('/destroy/{id}', [App\Http\Controllers\kaprodi\Perusahaan1Controller::class, 'destroy'])->name('kaprodi.perusahaan.destroy');
        });
    });
});

//mahasiswa
Route::get('/login', [LoginController::class, 'LoginMahasiswa'])->name('mahasiswa.login');
Route::post('/login', [LoginController::class, 'storeMahasiswa'])->name('mahasiswa.store');
Route::post('/logout', [LoginController::class, 'logoutMahasiswa'])->name('mahasiswa.logout');

Route::middleware('auth:mahasiswa')->group(function () {
    Route::get('/home', [App\Http\Controllers\Mahas\HomeController::class, 'index'])->name('mahasiswa.home');
    Route::get('/', [App\Http\Controllers\Mahas\HomeController::class, 'index']);
    Route::resource('pendaftaran', App\Http\Controllers\Mahas\SuratmahController::class);
    Route::get('/surat/getLatestSurat', [HomeController::class, 'getLatestSurat'])->name('surat.getLatestSurat');
});
