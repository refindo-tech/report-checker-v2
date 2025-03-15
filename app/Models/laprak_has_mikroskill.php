<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laprak_has_mikroskill extends Model
{
    use HasFactory;

    protected $table = 'laprak_has_mikroskill';
    protected $fillable = ['id_laprak', 'id_mikroskill'];

    public function report()
    {
        return $this->belongsTo(finalReport::class, 'id_laprak', 'id');
    }

    public function mikroskill()
    {
        return $this->belongsTo(CplMikroskil::class, 'id_mikroskill', 'id');
    }
}
