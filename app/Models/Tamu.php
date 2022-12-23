<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'tamu';
    protected $autoincrement = 'id';
    protected $fillable = [
        'nama', 'nik', 'alamat','instansi','tanggal','bidang_terkait','keperluan','foto_ktp', 'foto_webcam'
    ];
}
