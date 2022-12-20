<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Tahun;
use App\Models\Murid;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    public function index()
    {
        // $pembayaran = Pembayaran::find('id');
        $data = [
            'page' => 'Data Pembayaran',
            'title' => 'Data Pembayaran',
            'pembayaran' => Pembayaran::latest()->get(),
            'tahun' => Tahun::all()
        ];
        return view('admin.pembayaran.ppp', $data);
        // dd($data);
    }
    public function detail($id, $slug)
    {
        $data = [
            'page' => 'Detail Pembayaran',
            'title' => 'Detail Pembayaran',
            'murid' => Murid::all(),
            'pembayaran' => Pembayaran::find($id)
        ];
        return view('admin.pembayaran.dtl_ppp', $data);
    }
    public function create()
    {
        $data = [
            'page' => 'Tambah Pembayaran',
            'title' => 'Tambah Pembayaran',
            'pembayaran' => Pembayaran::all(),
            'tahun' => Tahun::all()
        ];
        return view('admin.pembayaran', $data);
    }
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'thn_id' => 'required'
        ];
        $message = [
            'nama.required' => 'Nama Pembayaran Tidak Boleh Kosong',
            'thn_id.required' => 'Tahun Tidak Boleh Kosong',
        ];
        $this->validate($request, $rules);
        Pembayaran::create(
            [
                'nama' => $request->nama,
                'thn_id' => $request->thn_id
            ]
        );
        // dd($request);
        Alert::success('Success', 'Data Berhasil Di Tambah :)');
        toastr()->success('Data Berhasil Ditambah ');
        return redirect('/ppp');
    }
    public function edit($id, $slug)
    {

        $data = [
            'page' => 'Edit Pembayaran',
            'title' => 'Edit Pembayaran',
            'pembayaran' => Pembayaran::find($id),
            'tahun' => Tahun::all()
        ];
        return view('admin.pembayaran.edit_ppp', $data);
    }
    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required',
            'thn_id' => 'required'
        ];
        $message = [
            'nama.required' => 'Nama Pembayaran Tidak Boleh Kosong',
            'thn_id.required' => 'Tahun Tidak Boleh Kosong',
        ];
        $this->validate($request, $rules, $message);

        $pembayaran = Pembayaran::find($id);
        $pembayaran->nama = $request->input('nama');
        $pembayaran->thn_id = $request->input('thn_id');
        $pembayaran->save();

        $pembayaran->update();
        Alert::success('Success', 'Data Berhasil Di Edit. :)');
        toastr()->success('Data Berhasil Di Edit.');
        return redirect('/ppp');
        // return $pembayaran;
    }
    public function hapus($id)
    {
        $pembayaran = Pembayaran::find($id);

        $pembayaran->delete();

        Alert::success('Success', 'Data Berhasil Dihapus.');
        toastr()->success('Data Berhasil Dihapus.');
        return redirect('/ppp');
        // $pembayaran = Pembayaran::where('id', $id)->delete();
        // return $pembayaran;
    }
}