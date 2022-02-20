<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontingen extends Model
{
    protected $useTimestamps = true;
    protected $fillable = ['nama_kon', 'id_plth'];
    protected $primaryKey = 'id';

    protected $with = 'Pelatih';

    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, 'id_plth');
    }
}