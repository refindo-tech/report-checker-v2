<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laprak_has_assesment extends Model
{
    use HasFactory;

    protected $table = 'laprak_has_assesment';
    protected $fillable = ['id_laprak', 'id_matkul', 'nilai'];

    public function report()
    {
        return $this->belongsTo(finalReport::class, 'id_laprak', 'id');
    }

    public function matkul(){
        return $this->belongsTo(MataKuliah::class, 'id_matkul', 'id');
    }

    public function assesment()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matkul', 'id');
    }
}
