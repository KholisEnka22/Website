<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Kontingen;
use App\Models\Tingkat;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $murid = Murid::all();
        $data = [
            'title' => 'Daftar Murid',
            'murid' => $murid,
            'kontingen' => new Kontingen()
        ];
        return view('admin.murid.murid', $data);
    }
    // public function detail($id)
    // {
    //     $murid = Murid::where('kon_id', $id)->get();
    //     $data = [
    //         'title' => 'Kontingen',
    //         'murid' => $murid
    //     ];
    //     return view('admin.kontingen.dtl_konti', $data);
    // }
    public function create()
    {

        $data = [
            'title' => 'Tambah Murid',
            'tingkat' => Tingkat::all(),
            'kontingen' => Kontingen::all()
        ];
        return view('admin.murid.add_murid', $data);
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'ttl' => 'required',
                'ting_id' => 'required',
                'kon_id' => 'required'
            ]
        );
        Murid::create($request->all());

        return redirect('/murid');
    }
}