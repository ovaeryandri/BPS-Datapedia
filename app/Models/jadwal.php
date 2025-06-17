<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        "janjitemu_id",
        "konsultan_id",
    ];

     public function janjitemu()
    {
        return $this->belongsTo(janjitemu::class);
    }

    public function konsultan()
    {
        return $this->belongsTo(konsultan::class);
    }
}
