<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Agenda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teacher";
    protected $primaryKey = "id";
    protected $fillable = ['id','teacher'];

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
