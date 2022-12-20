<?php

namespace App\Imports;

use App\Models\Murid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;


class MuridImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //Membuat IDMurid Otomatis
        $murid = Murid::get()->last();
        if ($murid == null) {
            $nubRow = 1;
        } else {
            $id = substr($murid->mrd_id, 9, 3);
            $id = (int) $id;
            $nubRow = $id + 1;
        }

        if ($nubRow < 10) {
            $mrd_id = 'PNSA' . '-' . date('Y') . "00" . $nubRow;
        } elseif ($nubRow >= 10 && $nubRow <= 99) {
            $mrd_id = 'PNSA' . '-' . date('Y') . "0" . $nubRow;
        } elseif ($nubRow <= 100) {
            $mrd_id = 'PNSA' . '-' . date('Y') . $nubRow;
        }

        //Import ke table User
        $user = User::get()->last();
        $user->role = 'murid';
        $user->name = $murid->nama;
        $user->email = $murid->email;
        $user->password = bcrypt ($murid->tgl);
        $user->remember_token = str::random(50);
        $user->save();

        if ($row[0] == 'No') {
            return null;
        }
            print_r($row);
        return Murid::create([
            'user_id' => $user->id,
            'nik' => $row[1],
            'mrd_id' => $mrd_id,
            'nama' => $row[2],
            'email' => $row[3],
            'jns_klmin' => $row[4],
            'alamat' => $row[5],
            'tmpt' => $row[6],
            'tgl' => $row[7],
            'ting_id' => $row[8],
            'kon_id' => $row[9],
            'thn_id' => $row[10],
            'foto' => 'default.png'
        ]);
    }
}