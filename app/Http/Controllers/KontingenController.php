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
        // $this->Kontingen = new Kontingen();
        // $this->middleware(['admin', 'auth']);;
    }
    public function index()
    {
        $count = DB::table('murids')->count();
        $data = [
            'page' => 'Rayon',
            'title' => 'Daftar Rayon',
            'kontingen' => Kontingen::all(),
            'murid' => new Murid()
        ];

        return view('admin.kontingen.konti', $data, compact('count'));
    }
    public function create()
    {
        $data = [
            'page' => 'Kontingen',
            'title' => 'Tambah Rayon'
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

    public function detail($id, $slug)
    {
        $murid = Murid::where('kon_id', $id)->get();
        $data = [
            'page' => 'Kontingen',
            'title' => 'Data Kontingen',
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