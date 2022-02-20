<?php

namespace App\Imports;

use App\Models\Murid;
use Maatwebsite\Excel\Concerns\ToModel;

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
        $murid = Murid::where('id')->get();
        $nubRow = count($murid) + 1;
        if ($nubRow < 10) {
            $mrd_id = 'PNSA' . '-' . date('Y') . "00" . $nubRow;
        } elseif ($nubRow >= 10 && $nubRow <= 99) {
            $mrd_id = 'PNSA' . '-' . date('Y') . "0" . $nubRow;
        } elseif ($nubRow <= 100) {
            $mrd_id = 'PNSA' . '-' . date('Y') . $nubRow;
        }

        return new Murid([
            'nik' => $row[1],
            'mrd_id' => $mrd_id,
            'nama' => $row[2],
            'email' => $row[3],
            'jns_klmin' => $row[4],
            'alamat' => $row[5],
            'tmpt' => $row[6],
            'tgl' => $row[7],
            'ting_id' => $row[8],
            'kon_id' => $row[9]
        ]);
    }
}