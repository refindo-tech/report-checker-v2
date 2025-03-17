<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;

    protected $table = 'kampuses';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'website',
        'image',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function mikroskil()
    {
        return $this->hasMany(CplMikroskil::class);
    }
    public function fakultas()
    {
        return $this->hasMany(Fakultas::class);
    }
}
