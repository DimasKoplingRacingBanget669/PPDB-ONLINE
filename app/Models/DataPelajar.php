<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPelajar extends Model
{
    public $timestamps = false;
    protected $table = 'data_pelajar';
    // Definisikan atribut-atribut yang dapat diisi
    protected $fillable = ['nisn', 'nama', 'jenis_kelamin', 'alamat', 'tanggal_lahir', 'jurusan', 'foto'];
}
