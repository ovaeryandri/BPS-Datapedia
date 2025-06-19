<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class janjitemu extends Model
{
     protected $table = 'janjitemu'; // nama tabel sesuai di database

    protected $fillable = [
        'users_id',
        'alamat',
        'keperluan',
        'tanggal',
        'jenis',
    ];

    public function user()
    {
        return $this->belongsTo(akunuser::class, 'users_id');
    }

   public function jadwal()
{
    return $this->hasOne(jadwal::class);
}

}
