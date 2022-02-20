<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Models\Tingkat;
use App\Models\Kontingen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PelatihController extends Controller
{
    public function index()
    {

        $data = [
            'page' => 'Daftar Pelatih',
            'title' => 'Daftar Pelatih',
            'pelatih' => Pelatih::latest()->get()
        ];
        return view('admin.pelatih.plth', $data);
        // dd($data);
    }
    public function detail($id, $slug)
    {
        $data = [
            'page' => 'Profil Pelatih',
            'title' => 'Detail Pelatih',
            'pelatih' => Pelatih::find($id)
        ];
        return view('admin.plth.dtl_plth', $data);
    }
    public function create()
    {
        $pelatih = Pelatih::all();
        $data = [
            'page' => 'Tambah Pelatih',
            'title' => 'Tambah Pelatih',
            'tingkat' => Tingkat::all(),
            'kontingen' => Kontingen::all()
        ];
        return view('admin.pelatih.add_plth', $data);
    }
    public function store(Request $request)
    {


        $rules = [
            'nik' => 'required',
            'nama' => 'required|unique:pelatihs',
            'email' => 'required|unique:pelatihs|email',
            'jns_klmin' => 'required',
            'alamat' => 'required',
            'tmpt' => 'required',
            'tgl' => 'required',
            'ting_id' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ];
        $message = [
            'nik.required' => ' NIK Tidak Boleh Kosong',
            'nama.required' => ' Nama Tidak Boleh Kosong',
            'nama.unique' => ' Nama Sudah Terdaftar',
            'email.required' => ' Email Tidak Boleh Kosong',
            'email.unique' => ' Email Sudah Terdaftar',
            'jns_klmin.required' => ' Jenis Kelamin Tidak Boleh Kosong',
            'alamat.required' => ' Alamat Tidak Boleh Kosong',
            'tmpt.required' => ' Kota Kelahiran Tidak Boleh Kosong',
            'tgl.required' => ' Tanggal Lahir Tidak Boleh Kosong',
            'ting_id.required' => ' Tingkat Tidak Boleh Kosong',
            'foto.required' => ' Foto Tidak Boleh Kosong',
            'foto.mimes' => ' Format Foto Tidak Didukung',
            'foto.max' => ' Ukuran File Terlalu Besar'
        ];
        $this->validate($request, $rules, $message);

        $filename = $request->foto->getClientOriginalName();
        $request->file('foto')->move('fotopelatih/', $request->file('foto')->getClientOriginalName());
        $request->foto = $request->file('foto')->getClientOriginalName();

        $pelatih = Pelatih::where('id')->get();
        $nubRow = count($pelatih) + 1;
        if ($nubRow < 10) {
            $plth_id = 'PNSA' . '-' . date('Y') . "00" . $nubRow;
        } elseif ($nubRow >= 10 && $nubRow <= 99) {
            $plth_id = 'PNSA' . '-' . date('Y') . "0" . $nubRow;
        } elseif ($nubRow <= 100) {
            $plth_id = 'PNSA' . '-' . date('Y') . $nubRow;
        }

        $user = new User;
        $user->role = 'pelatih';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->tgl);
        $user->remember_token = str::random(50);
        $user->save();

        Pelatih::create(
            [
                'user_id' => $user->id,
                'plth_id' => $plth_id,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'email' => $request->email,
                'jns_klmin' => $request->jns_klmin,
                'alamat' => $request->alamat,
                'tmpt' => $request->tmpt,
                'tgl' => $request->tgl,
                'ting_id' => $request->ting_id,
                'kon_id' => $request->kon_id,
                'foto' => $request->foto
            ]
        );

        Alert::success('Success', 'Data Berhasil Di Tambah :)');
        toastr()->success('Data Berhasil Ditambah ');
        return redirect('/pelatih');
        // dd($request->all());
    }
}