<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $useTimestamps = true;
    protected $fillable = ['thn_id', 'nama'];
    protected $primaryKey = 'id';

    protected $with = ['Tahun'];

    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'thn_id');
    }
}