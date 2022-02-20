<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $useTimestamps = true;
    protected $fillable = ['nama_r', 'nama_p', 'no_tlp', 'jumlah_a', 'thn_p', 'bln_1', 'bln_2', 'status', 'created_at', 'updated_at'];
    protected $primaryKey = 'id';
}