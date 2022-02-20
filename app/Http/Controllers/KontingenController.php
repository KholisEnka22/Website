<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontingen;
use App\Models\Murid;
use App\Models\Pelatih;
use DB;

class KontingenController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $count = DB::table('murids')->count();
        $data = [
            'page' => 'Rayon',
            'title' => 'Daftar Rayon',
            'kontingen' => Kontingen::all(),
            'murid' => new Murid(),
            'pelatih' => Pelatih::all()
        ];
        // dd($data);

        return view('admin.kontingen.konti', $data, compact('count'));
    }
    public function create()
    {
        $rayon = Kontingen::all();
        $data = [
            'page' => 'Rayon',
            'title' => 'Tambah Rayon',
            'pelatih' => Pelatih::all(),
            'kontingen' => $rayon
        ];
        return view('admin.kontingen.add_konti', $data);
    }
    public function store(Request $request)
    {
        $rules = [
            'id_plth' => 'required',
            'nama_kon' => 'required|unique:kontingens',
        ];
        $message = [
            'id_plth.required' => ' Pelatih Tidak Boleh Kosong',
            'nama_kon.required' => ' Nama Rayon Tidak Boleh Kosong',
            'nama_kon.unique' => ' Nama Rayon Sudah Terdaftar',
        ];

        $this->validate($request, $rules, $message);

        // Kontingen::create($request->all());
        Kontingen::create(
            [
                'id_plth' => $request->id_plth,
                'nama_kon' => $request->nama_kon
            ]
        );

        // dd($request->all());
        return redirect('/kontingen')->with('success', 'Data Berhasil Ditambah');
    }

    public function detail($id, $slug)
    {
        $murid = Murid::where('kon_id', $id)->get();
        $data = [
            'page' => 'Kontingen',
            'title' => 'Data Kontingen',
            'pelatih' => Pelatih::all(),
            'murid' => $murid
        ];
        return view('admin.kontingen.dtl_konti', $data);
    }
    public function hapus($id)
    {
        $konti = Kontingen::find($id);

        $konti->deleted();
        Alert::success('Success', 'Kontingen Berhasil Dihapus.');
        toastr()->success('Kontingen Berhasil Dihapus.');
        return redirect('/kontingen');
    }
}