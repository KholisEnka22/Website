<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Murid;
use App\Models\Tingkat;

class TingkatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
    // {
    //     $murid = Murid::all();
    //     $data = [
    //         'title' => 'Daftar Tingkat Sabuk',
    //         'murid' => $murid,
    //         'tingkat' => new Tingkat()

    //     ];
    //     return view('admin.tingkat.tingkat', $data);
    // }
    public function index($id)
    {
        $murid = Murid::where('ting_id', $id)->get();
        $data = [
            'title' => 'Daftar Tingkat Sabuk',
            'murid' => $murid,
            'tingkat' => new Tingkat()

        ];
        return view('admin.tingkat.tingkat', $data);
    }
}