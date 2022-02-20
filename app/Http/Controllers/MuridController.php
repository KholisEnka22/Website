<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Kontingen;
use App\Models\Tingkat;
use App\Models\User;
use App\Imports\MuridImport;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class MuridController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        $data = [
            'page' => 'Daftar Murid',
            'title' => 'Daftar Murid',
            'tahun' => Tahun::all(),
            'murid' =>  Murid::latest()->get()
        ];
        return view('admin.murid.murid', $data);
    }

    public function muridimportexcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMurid', $namaFile);


        Excel::import(new MuridImport, public_path('/DataMurid/' . $namaFile));

        // return redirect('/murid');
        dd($request->all());
    }

    public function detail($id, $slug)
    {
        $data = [
            'page' => 'Profil Murid',
            'title' => 'Detail Murid',
            'murid' => Murid::find($id)
        ];
        return view('admin.murid.dtl_murid', $data);
    }
    public function create()
    {
        $murid = Murid::all();
        $data = [
            'page' => 'Tambah Murid',
            'title' => 'Tambah Murid',
            'tahun' => Tahun::all(),
            'tingkat' => Tingkat::all(),
            'kontingen' => Kontingen::all()
        ];
        return view('admin.murid.add_murid', $data);
    }
    public function store(Request $request)
    {
        $rules = [
            'nik' => 'required',
            'nama' => 'required|unique:murids,id',
            'email' => 'required|unique:murids|email',
            'thn_id' => 'required|unique:murids,id',
            'jns_klmin' => 'required',
            'alamat' => 'required',
            'tmpt' => 'required',
            'tgl' => 'required',
            'ting_id' => 'required',
            'kon_id' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ];
        $message = [
            'nik.required' => ' NIK Tidak Boleh Kosong',
            'nama.required' => ' Nama Tidak Boleh Kosong',
            'nama.unique' => ' Nama Sudah Terdaftar',
            'email.required' => ' Email Tidak Boleh Kosong',
            'email.unique' => ' Email Sudah Terdaftar',
            'thn_id.required' => ' Tahun Ajaran Tidak Boleh Kosong',
            'thn_id.unique' => ' Murid Sudah Terdaftar Ditahun Ini',
            'jns_klmin.required' => ' Jenis Kelamin Tidak Boleh Kosong',
            'alamat.required' => ' Alamat Tidak Boleh Kosong',
            'tmpt.required' => ' Kota Kelahiran Tidak Boleh Kosong',
            'tgl.required' => ' Tanggal Lahir Tidak Boleh Kosong',
            'ting_id.required' => ' Tingkat Tidak Boleh Kosong',
            'kon_id.required' => ' Kontingen Tidak Boleh Kosong',
            'foto.required' => ' Foto Tidak Boleh Kosong',
            'foto.mimes' => ' Format Foto Tidak Didukung',
            'foto.max' => ' Ukuran File Terlalu Besar'
        ];
        $this->validate($request, $rules, $message);

        //Input Foto
        $filename = $request->foto->getClientOriginalName();
        $request->file('foto')->move('fotomurid/', $request->file('foto')->getClientOriginalName());
        $request->foto = $request->file('foto')->getClientOriginalName();

        //Membuat IDMurid Otomatis
        $murid = Murid::where('id')->get();
        $nubRow = count($murid) + 1;
        if ($nubRow < 10) {
            $mrd_id = 'PNSA' . '-' . date('Y') . "00" . $nubRow;
        } elseif ($nubRow >= 10 && $nubRow <= 99) {
            $mrd_id = 'PNSA' . '-' . date('Y') . "0" . $nubRow;
        } elseif ($nubRow <= 100) {
            $mrd_id = 'PNSA' . '-' . date('Y') . $nubRow;
        }

        //Import ke table User
        $user = new User;
        $user->role = 'murid';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->tgl);
        $user->remember_token = str::random(50);
        $user->save();


        Murid::create(
            [
                'user_id' => $user->id,
                'mrd_id' => $mrd_id,
                'nik' => $request->nik,
                'thn_id' => $request->thn_id,
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
        return redirect('/murid');
        // dd($request->all());
    }
    public function edit($id, $slug)
    {

        $data = [
            'page' => 'Update Murid',
            'title' => 'Update Murid',
            'tahun' => Tahun::all(),
            'murid' => Murid::find($id),
            'tingkat' => Tingkat::all(),
            'kontingen' => Kontingen::all()
        ];
        return view('admin.murid.edit_murid', $data);
    }
    public function update(Request $request, $id)
    {

        $rules = [
            'nik' => 'required',
            'nama' => 'required|unique:murids,id',
            'email' => 'required|unique:murids,id,email',
            'jns_klmin' => 'required',
            'alamat' => 'required',
            'tmpt' => 'required',
            'tgl' => 'required',
            'thn_id' => 'required|unique:murids,id',
            'ting_id' => 'required',
            'kon_id' => 'required',
            'foto' => 'mimes:jpeg,png,jpg,gif,svg|max:500'
        ];
        $message = [
            'nik.required' => ' NIK Tidak Boleh Kosong',
            'nama.required' => ' Nama Tidak Boleh Kosong',
            'nama.unique' => ' Nama Sudah Terdaftar',
            'email.required' => ' Email Tidak Boleh Kosong',
            'email.unique' => ' Email Sudah Terdaftar',
            'thn_id.required' => ' Tahun Ajaran Tidak Boleh Kosong',
            'thn_id.unique' => ' Murid Sudah Terdaftar Ditahun Ini',
            'jns_klmin.required' => ' Jenis Kelamin Tidak Boleh Kosong',
            'alamat.required' => ' Alamat Tidak Boleh Kosong',
            'tmpt.required' => ' Kota Kelahiran Tidak Boleh Kosong',
            'tgl.required' => ' Tanggal Lahir Tidak Boleh Kosong',
            'ting_id.required' => ' Tingkat Tidak Boleh Kosong',
            'kon_id.required' => ' Kontingen Tidak Boleh Kosong',
            'foto.mimes' => ' Format Foto Tidak Didukung',
            'foto.max' => ' Ukuran File Terlalu Besar'
        ];
        $this->validate($request, $rules, $message);

        $murid = Murid::find($id);
        $murid->nik = $request->input('nik');
        $murid->nama = $request->input('nama');
        $murid->email = $request->input('email');
        $murid->thn_id = $request->input('thn_id');
        $murid->jns_klmin = $request->input('jns_klmin');
        $murid->alamat = $request->input('alamat');
        $murid->tmpt = $request->input('tmpt');
        $murid->tgl = $request->input('tgl');
        $murid->ting_id = $request->input('ting_id');
        $murid->kon_id = $request->input('kon_id');

        if ($request->hasFile('foto')) {
            $destination = 'fotomurid/' . $murid->foto;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalName();
            $filename = $request->foto->getClientOriginalName();
            $file->move('fotomurid', $filename);
            $murid->foto = $filename;
        }
        $murid->update();
        // dd($request->all());
        Alert::success('Success', 'Data Berhasil Di Edit. :)');
        toastr()->success('Data Berhasil Di Edit.');
        return redirect('/murid');
    }
    public function hapus($id)
    {
        $murid = Murid::find($id);

        $destination = 'fotomurid/' . $murid->foto;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $murid->delete();

        Alert::success('Success', 'Data Berhasil Dihapus.');
        toastr()->success('Data Berhasil Dihapus.');
        return redirect('/murid');
    }
}