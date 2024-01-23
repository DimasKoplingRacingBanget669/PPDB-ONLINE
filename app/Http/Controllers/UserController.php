<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\DataPelajar;
use DateTime;

class UserController extends Controller
{
    public function index()
    {
        $status = '';
        $user = Auth::user();
        $existingNisn = User::where('nisn', $user->nisn)->where('id', '!=', $user->id)->exists();

        if ($existingNisn) {
            // NISN sudah ada untuk pengguna lain, berikan respon atau lakukan tindakan yang sesuai
            $status = 'Update-NISN';
        } else {
            $status = 'Upload-Data';
        }


        // Check apakah NISN sudah terdaftar sebelum melakukan login
        $existingNisn = DB::table('data_pelajar')->where('nisn', $user->nisn)->exists();

        if (!$existingNisn) {
            // NISN tidak terdaftar, berikan respon atau lakukan tindakan yang sesuai
            return view('users.HomePendaftaran', [
                'user' => $user,
                'status' => $status,
            ]);
        }

        $dataPelajar = DataPelajar::where('nisn', $user->nisn)->first();
        return view('users.Home', [
            'user' => $user,
            'dataPelajar' => $dataPelajar,
        ]);
    }

    public function LampirkanBerkas()
    {
        $user = Auth::user();
        $dataPelajar = DataPelajar::where('nisn', $user->nisn)->first();
        return view('users.Components.Lampirkan', [
            'user' => $user,
            'dataPelajar' => $dataPelajar,
        ]);
    }

    public function _UpdateNISN(Request $request)
    {
        // Validasi data menggunakan metode validate() Laravel
        $validatedData = [
            'id' => $request->input('id'), // Memastikan bahwa id yang dimasukkan benar-benar ada di tabel users
            'nisn' => $request->input('nisn'), // Memastikan nisn unik kecuali untuk user dengan id tertentu
        ];

        DB::table('users')
            ->where('id', $validatedData['id'])
            ->update(['nisn' => $validatedData['nisn']]);

        // Menggunakan route() untuk menghasilkan URL berdasarkan nama rute
        return redirect()->route('User-Home');
    }

    public function _UploadData(Request $request)
    {
        $dateString = $request->input('tanggal_lahir');
        $date = DateTime::createFromFormat('Y-m-d', $dateString);
        $validatedData = [
            'nisn' => intval($request->input('nisn')),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tanggal_lahir' => $date,
            'jurusan' => $request->input('jurusan'),
        ];

        try {
            DB::table('data_pelajar')->insert([
                'nisn' => $validatedData['nisn'],
                'nama' => $validatedData['nama'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'alamat' => $validatedData['alamat'],
                'tanggal_lahir' => $validatedData['tanggal_lahir'],
                'jurusan' => $validatedData['jurusan'],
                'foto' => null,
                'idBerkas' => null
            ]);

            // Redirect atau berikan respons sesuai kebutuhan
            return Redirect::route('User-Home')->with(['succes' => 'Data berhasil di input']);
        } catch (\Exception $e) {
            // Tangani pengecualian dan tampilkan pesan kesalahan
            // return Redirect::back()->withInput()->withErrors(['error' => 'Error saving data: ' . $e->getMessage()]);
            return [
                'info' => $e,
                'data' => $validatedData
            ];
        }
    }


    public function _UploadFoto(Request $request)
    {

        $user = Auth::user();
        // Validasi request
        $request->validate([
            'photo' => 'required|image|mimes:jpeg|max:1024', // JPEG, maksimum 1MB
        ]);

        // Proses gambar yang diunggah
        $image = $request->file('photo');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

        // Pindahkan gambar ke direktori penyimpanan
        $image->move(public_path("data/images"), $imageName);

        // Lakukan apa pun yang perlu Anda lakukan dengan gambar, misalnya, menyimpan informasi gambar ke database, dll.
        DataPelajar::where('nisn', $user->nisn)->update([
            'foto' => $imageName,
        ]);

        // Tanggapan yang dikirim ke klien (JavaScript)
        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil diunggah.'
        ]);
    }

    public function _UploadLampiran(Request $request)
    {
        $user = Auth::user();
        $data = [];
        try {
            $tipe_pendaftaran = $request->jalur_pendaftaran;

            $validations = [
                'Mandiri' => ['raport'],
                'Prestasi' => ['raport', 'prestasi'],
                'Kip' => ['raport', 'kip'],
            ];

            if (!isset($validations[$tipe_pendaftaran])) {
                return response(['error' => 'Jalur Pendaftaran tidak valid'], 400);
            }

            $rules = [];
            foreach ($validations[$tipe_pendaftaran] as $field) {
                $rules[$field] = 'required|image|mimes:jpeg|max:1024';
            }

            $request->validate($rules);

            $idFolder = uniqid() . $user->nisn;
            foreach ($validations[$tipe_pendaftaran] as $field) {
                $fileName = uniqid() . '.' . $request->file($field)->getClientOriginalExtension();
                $data[$field] = $fileName;
                $request->file($field)->move(public_path("data/documents/{$tipe_pendaftaran}/{$idFolder}"), $fileName);
            }
            DataPelajar::where('nisn', $user->nisn)->update([
                'idBerkas' => $idFolder,
            ]);

            return redirect()->back()->with([
                'success' => true,
                'message' => 'Data Berhasil Di Upload'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response(['error' => $e->getMessage()], 500);
        }
    }
}
