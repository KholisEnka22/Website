<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;

use App\Models\Murid;
use App\Models\Pelatih;
use App\Models\Tingkat;

class TingkatController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'page' => 'Daftar Tingkat',
            'title' => 'Daftar Tingkat Sabuk',
            'tingkats' => Tingkat::all(),
            'pelatih' => Pelatih::all(),
            'murids' => new Murid()

        ];
        return view('admin.tingkat.tingkat', $data);
    }

    public function show($id)
    {
        $murid = Murid::with('ting_id', $id)->get();
        $pelatih = Pelatih::with('ting_id', $id)->get();
        $data = [
            'title' => 'Daftar Tingkat Sabuk',
            'murid' => $murid,
            'pelatih' => $pelatih,
            'tingkat' => new Tingkat()

        ];
        return view('admin.tingkat.tingkat', $data);
    }
}