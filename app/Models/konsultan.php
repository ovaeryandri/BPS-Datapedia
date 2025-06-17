<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konsultan extends Model
{
    use HasFactory;
    protected $table = 'konsultans';

    protected $fillable = [
        "email",
        "nama",
        "password",
        "no_hp",
    ];
    public function jadwals()
{
    return $this->hasMany(jadwal::class);
}
}
