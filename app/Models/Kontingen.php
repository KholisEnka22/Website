<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontingen extends Model
{
    protected $useTimestamps = true;
    protected $fillable = ['nama_kon'];
    protected $primaryKey = 'id';

    // public function getKontingen($id = false)
    // {
    //     if ($id == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where(['id' => $id])->first();
    // }
    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}