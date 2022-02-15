<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;

use App\Models\Murid;
use App\Models\Tingkat;

class TingkatController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['admin', 'auth']);;
    }

    public function index()
    {
        $data = [
            'page' => 'Daftar Tingkat',
            'title' => 'Daftar Tingkat Sabuk',
            'tingkats' => Tingkat::all(),
            'murids' => new Murid()

        ];
        return view('admin.tingkat.tingkat', $data);
    }

    public function show($id)
    {
        $murid = Murid::with('ting_id', $id)->get();
        $data = [
            'title' => 'Daftar Tingkat Sabuk',
            'murid' => $murid,
            'tingkat' => new Tingkat()

        ];
        return view('admin.tingkat.tingkat', $data);
    }
}