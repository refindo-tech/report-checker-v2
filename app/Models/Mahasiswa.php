<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nim',
        'gender',
        'phone',
        'address',
        'prodi',
        'fakultas',
        'semester',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report()
    {
        return $this->hasMany(finalReport::class);
    }
}
