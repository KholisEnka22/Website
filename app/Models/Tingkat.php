<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    protected $useTimestamps = true;
    protected $fillable = ['nama_tgkt'];
    protected $primaryKey = 'id';

    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}