<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $data = [
            'page' => 'Data Pribadi',
            'title' => 'Data Pribadi',

        ];
        return view('user.home', $data);
    }
    public function data()
    {

        $data = [
            'page' => 'Data Pribadi',
            'title' => 'Data Pribadi',
            'murid' =>  Murid::latest()->get()
        ];
        return view('user.data', $data);
        // dd($data);
    }
}