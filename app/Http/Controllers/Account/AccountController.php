<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Murid;
use App\Models\Kontingen;
use Illuminate\Support\Facades\Hash;
use DB;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profil()
    {
        $count = DB::table('murids')->count();
        $data = [
            'page' => 'Admin Profil',
            'title' => 'Admin Profil',
            'user' => User::all(),
            'murid' => Murid::all(),
            'konti' => Kontingen::all()
        ];
        return view('account.profil', $data);
    }
    public function update()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $currentPassword = auth()->user()->password;

        $old_password = request('old_password');

        if (Has::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            Alert::success('Success', 'Data Berhasil Di Edit. :)');
            toastr()->success('Data Berhasil Di Edit.');
            return back();
        } else {
            Alert::error('Error', 'Data Berhasil Di Edit. :)');
            toastr()->error('Data Berhasil Di Edit.');
            return back();
        }
    }
}