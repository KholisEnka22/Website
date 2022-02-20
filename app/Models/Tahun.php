<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    protected $useTimestamps = true;
    protected $fillable = ['tahun_pertama', 'tahun_kedua'];
    protected $primaryKey = 'id';

    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}