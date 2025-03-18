<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $fillable = [
        'id_kampus',
        'id_prodi',
        'name',
        'sks',
    ];

    public function programStudi(){
        return $this->belongsTo(ProgramStudi::class, 'id_prodi');
    }

    public function kampus(){
        return $this->belongsTo(Kampus::class, 'id_kampus');
    }
}
