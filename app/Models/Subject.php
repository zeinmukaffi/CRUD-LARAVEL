<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = "subject";
    protected $primaryKey = "id";
    protected $fillable = ['id','subject'];

    public function gurus()
    {
        return $this->hasMany(Guru::class);
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }
}
