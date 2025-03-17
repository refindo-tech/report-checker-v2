<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';

    protected $fillable = [
        'name',
        'id_kampus',
    ];

    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'id_kampus');
    }

    public function prodi()
    {
        return $this->hasMany(ProgramStudi::class, 'id_fakultas');
    }
}
