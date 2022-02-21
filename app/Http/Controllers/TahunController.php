<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Murid;
use Illuminate\Support\Facades\DB as FacadesDB;

class TahunController extends Controller
{
    public function index()
    {
        $count = FacadesDB::table('murids')->count();
        $data = [
            'page' => 'Angkatan',
            'title' => 'Tahun Angkatan',
            'murid' => new Murid(),
            'tahun' => Tahun::all()
        ];
        return view('admin.tahun.tahun', $data);
    }

    public function create()
    {
        $tahun = Tahun::all();
        $data = [
            'page' => 'Tambah Tahun',
            'title' => 'Tambah Tahun Angkatan'
        ];
        return view('admin.tahun.add_tahun', $data);
    }

    public function store(Request $request)
    {
        // return $request->all();

        $rules = [
            'tahun_pertama' => 'required',
            'tahun_kedua' => 'required'
        ];
        $message = [
            'tahun_pertama.required' => 'Tahun Tidak Boleh Kosong',
            'tahun_kedua.required' => 'Tahun Tidak Boleh Kosong'
        ];
        $this->validate($request, $rules, $message);

        Tahun::create(
            [
                'tahun_pertama' => $request->tahun_pertama,
                'tahun_kedua' => $request->tahun_kedua,
            ]
        );
        Alert::success('Success', 'Data Berhasil Di Tambah :)');
        return redirect('/tahun');
    }
}
