<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $useTimestamps = true;
    protected $fillable = ['kon_id', 'ting_id', 'user_id', 'mrd_id', 'nik', 'nama', 'email', 'jns_klmin', 'alamat', 'tmpt', 'tgl', 'foto'];
    protected $primaryKey = 'id';

    protected $with = ['Kontingen', 'Tingkat'];

    public function kontingen()
    {
        return $this->belongsTo(Kontingen::class, 'kon_id');
    }
    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class, 'ting_id');
    }
}