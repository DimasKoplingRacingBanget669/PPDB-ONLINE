<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();
            if (DB::connection()->getDatabaseName()) {
                echo "Yes! Successfully connected to the DB: " . DB::connection()->getDatabaseName();
            } else {
                echo "Database connection established, but unable to retrieve database name.";
            }
        } catch (\Exception $e) {
            echo "Failed to connect to the database. Error: " . $e->getMessage();
        }
        return Redirect::route('Login');
    }


    public function _HandleLogin(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'nisn' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('User-Home');
        } else {
            return redirect()->back()->withErrors(['error' => 'nisn atau password salah']);
        }
    }


    public function _HandleRegister(Request $request)
    {
        $level = '';
        // Validasi input
        $validatedData = $request->validate([
            'nisn' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Pengecekan apakah NISN sudah ada
        $existingNisn = DB::table('data_pelajar')->where('nisn', $validatedData['nisn'])->exists();

        if ($existingNisn) {
            // NISN sudah ada, berikan respons atau lakukan tindakan yang sesuai
            return Redirect::back()->withInput()->withErrors(['error' => 'NISN yang anda masukan sudah terdaftar']);
        }

        if (is_numeric($validatedData['nisn'])) {
            $level = 'Pelajar';
        } else {
            $level = 'Admin';
        }

        try {
            // Menyimpan data ke dalam tabel 'admin'
            DB::table('users')->insert([
                'nisn' => $validatedData['nisn'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'level' => $level,
            ]);

            // Redirect atau berikan respons sesuai kebutuhan
            return Redirect::route('Login');
        } catch (\Exception $e) {
            // Tangani pengecualian dan tampilkan pesan kesalahan
            return Redirect::back()->withInput()->withErrors(['error' => 'Error saving data: ' . $e->getMessage()]);
        }
    }

    public function _HandleLogOut()
    {
        Auth::logout();
        Session::flush();
        return redirect()->intended('Login');
    }
}
