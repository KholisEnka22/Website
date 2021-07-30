<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $useTimestamps = true;
    protected $fillable = ['kon_id', 'ting_id', 'nama', 'alamat', 'ttl'];
    protected $primaryKey = 'id';

    // public function getMurid($id = false)
    // {
    //     if ($id == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where(['id' => $id])->first();
    // }
    public function kontingen()
    {
        return $this->belongsTo(Kontingen::class, 'kon_id');
    }
    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class, 'ting_id');
    }
}