<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    protected $useTimestamps = true;
    protected $fillable = ['ting_id', 'user_id', 'plth_id', 'nik', 'nama', 'email', 'jns_klmin', 'alamat', 'tmpt', 'tgl', 'foto'];
    protected $primaryKey = 'id';

    protected $with = ['Tingkat'];

    public function kontingen()
    {
        return $this->hasMany(Kontingen::class, 'kon_id');
    }
    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class, 'ting_id');
    }
}