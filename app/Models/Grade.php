<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Agenda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    protected $table = "grade";
    protected $primaryKey = "id";
    protected $fillable = ['id','grade'];

    public function gurus()
    {
        return $this->hasMany(Guru::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }
}
