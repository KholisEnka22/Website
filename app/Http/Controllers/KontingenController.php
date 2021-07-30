<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontingen;
use App\Models\Murid;

use DB;

class KontingenController extends Controller
{
    public function __construct()
    {
        $this->Kontingen = new Kontingen();
        $this->middleware('auth');
    }
    public function index()
    {
        $count = DB::table('murids')->count();
        $kontingen = Kontingen::all();
        $data = [
            'title' => 'Daftar Kontingen',
            'kontingen' => $kontingen,
            'murid' => new Murid()
        ];

        return view('admin.kontingen.konti', $data, compact('count'));
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Kontingen'
        ];
        return view('admin.kontingen.add_konti', $data);
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kon' => 'required',
            ]
        );
        Kontingen::create($request->all());

        return redirect('/kontingen')->with('success', 'Data Berhasil Ditambah');
    }
    // public function detail()
    // {
    //     $murid = Murid::get();
    //     return view('admin.kontingen.dtl_konti', ['murid' => $murid]);
    // }
    public function detail($id)
    {
        $murid = Murid::where('kon_id', $id)->get();
        $data = [
            'title' => 'Data Kontingen',
            'murid' => $murid
        ];
        return view('admin.kontingen.dtl_konti', $data);
    }
}