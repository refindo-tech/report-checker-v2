<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalReport extends Model
{
    use HasFactory;

    protected $table = 'final_reports';

    protected $fillable = [
        'user_id',
        'reviewer_id',
        'status',
        'laprak',
        'sertifikat',
        'dokumentasi',
        'feedback',
        'nilai_sertifikat',
        'nilai_dokumentasi',
        'mitra',
        'addressMitra',
        'start_date',
        'end_date',
        'JenisKegiatan',
        'laprak_status',
        'sertifikat_status',
        'dokumentasi_status',
        'mikroskill_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviewer()
    {
        return $this->belongsTo(User::class);
    }

    public function dosen()
    {
        return $this->hasOneThrough(Dosen::class, User::class, 'id', 'user_id', 'reviewer_id', 'id');
    }

    public function mahasiswa()
    {
        return $this->hasOneThrough(Mahasiswa::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }


    public function assesment()
    {
        return $this->belongsToMany(
            MataKuliah::class,  // Model terkait
            'laprak_has_assesment', // Nama tabel pivot
            'id_laprak', // Foreign key di tabel pivot untuk model ini
            'id_matkul' // Foreign key di tabel pivot untuk model terkait
        )->withPivot(['nilai', 'created_at', 'updated_at']);
    }
}
