<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\akunuser;

class konsultasiKlik extends Model
{
    protected $table = 'konsultasi_klik';

    protected $fillable = [
        'users_id',
        'clicked_at',
        'nama',
        'jenis_kelamin',
        'email',
        'instansi',
        'keperluan',
        'data_diminta',
        'lainnya',
    ];

    public function user()
    {
        return $this->belongsTo(akunuser::class, 'users_id');
    }
}

