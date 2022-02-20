<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Models\Tingkat;
use App\Models\Kontingen;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    public function index()
    {

        $data = [
            'page' => 'PPP',
            'title' => 'PPP (Pembayaran Padepokan Pusat)',
            'pembayaran' => Pembayaran::latest()->get()
        ];
        return view('admin.pembayaran.ppp', $data);
        // dd($data);
    }
    public function create()
    {
        $ppp = Pembayaran::all();
        $data = [
            'page' => 'Tambah Rayon',
            'title' => 'Rayon'
        ];
        return view('admin.pembayaran.add_ppp', $data);
    }
    public function store(Request $request)
    {
        $rules = [
            'nama_r' => 'required',
            'nama_p' => 'required',
            'no_tlp' => 'required',
            'jumlah_a' => 'required',
            'thn_p' => 'required',
            'bln_1' => 'required',
            'bln_2' => 'required',
            'status' => 'required'
        ];
        $message = [
            'nama_r' => 'Nama Rayon Tidak Boleh Kosong',
            'nama_p' => 'Nama Pelatih Tidak Boleh Kosong',
            'no_tlp' => 'Nomor Tlp Pelatih Tidak Boleh Kosong',
            'jumlah_a' => 'Jumlah Anggota Tidak Boleh Kosong',
            'thn_p' => 'Tahun Pembayaran Tidak Boleh Kosong',
            'bln_1' => 'Cicilan Bulan pertama Tidak Boleh Kosong',
            'bln_2' => 'Cicilan Bulan ke-2 Tidak Boleh Kosong',
            'status' => 'Status Tidak Boleh Kosong'
        ];
        $this->validate($request, $rules, $message);


        Pembayaran::create(
            [
                'nama_r' => $request->nama_r,
                'nama_p' => $request->nama_p,
                'no_tlp' => $request->no_tlp,
                'jumlah_a' => $request->jumlah_a,
                'thn_p' => $request->thn_p,
                'bln_1' => $request->bln_1,
                'bln_2' => $request->bln_2,
                'status' => $request->status
            ]
        );

        Alert::success('Success', 'Data Berhasil Di Tambah :)');
        toastr()->success('Data Berhasil Ditambah ');
        return redirect('/ppp');
        // dd($request->all());
    }
}