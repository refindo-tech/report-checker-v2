<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CplMikroskil extends Model
{
    use HasFactory;

    protected $table = 'mikroskill';

    protected $fillable = [
        'id_kampus',
        'name',
        'sks',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'id_kampus');
    }

    public function report()
    {
        return $this->belongsToMany(
            FinalReport::class,  // Model terkait
            'laprak_has_mikroskill', // Nama tabel pivot
            'id_mikroskill', // Foreign key di tabel pivot untuk model ini
            'id_laprak' // Foreign key di tabel pivot untuk model terkait
        )->withPivot(['created_at', 'updated_at']);
    }
}
