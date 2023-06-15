<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    public function __construct()
    {
        //
    }

    public function LoginKaprodi()
    {
        return view('kaprodi.login');
    }

    public function storeKaprodi(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('kaprodi')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Cek jika pengguna yang berhasil login memiliki peran "kaprodi"
            $user = Auth::guard('kaprodi')->user();
            if ($user->role !== 'kaprodi') {
                Auth::guard('kaprodi')->logout(); // Logout pengguna yang peran tidak sesuai
                return redirect()->route('kaprodi.login')->with('loginError', 'Akses ditolak');
            }

            return redirect()->route('kaprodi.dashboard');
        }

        return redirect()->route('kaprodi.login')->with('loginError', 'Email atau Password salah');
    }

    public function logoutKaprodi(Request $request)
    {
        Auth::guard('kaprodi')->logout();
        $request->session()->invalidate();

        return redirect()->route('kaprodi.login');
    }


    public function LoginMahasiswa()
    {
        return view('mahasiswa.login');
    }

    public function storeMahasiswa(Request $request)
    {
        $this->validate($request, [
            'nim'   => 'required',
            'password' => 'required'
        ]);

        $this->validate($request, [
            'nim'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('mahasiswa')->attempt(['nim' => $request->nim, 'password' => $request->password])) {
            return redirect()->intended('/');
        }
        return redirect()->route('mahasiswa.login')->with('loginError', 'NIM atau Password salah');
    }

    public function logoutMahasiswa(Request $request)
    {
        Auth::guard('mahasiswa')->logout();

        $request->session()->invalidate();

        return redirect('/'); // Ubah redirect sesuai kebutuhan
    }

    public function loginAkademik()
    {
        return view('admin.login');
    }

    public function storeAkademik(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('akademik')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Cek jika pengguna yang berhasil login memiliki peran "akademik"
            $user = Auth::guard('akademik')->user();
            if ($user->role !== 'akademik') {
                Auth::guard('akademik')->logout(); // Logout pengguna yang peran tidak sesuai
                return redirect()->route('admin.login')->with('loginError', 'Akses ditolak');
            }

            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->with('loginError', 'Email atau Password salah');
    }

    public function logoutAkademik(Request $request)
    {
        Auth::guard('akademik')->logout();
        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }
}
