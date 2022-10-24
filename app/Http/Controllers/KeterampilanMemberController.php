<?php

namespace App\Http\Controllers;

use App\Models\DataNKeterampilan;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class KeterampilanMemberController extends Controller
{
    public function member()
    {
        return view('keterampilan.member');
    }
    public function data()
    {
        $data_keterampilan = DataNKeterampilan::leftJoin('users', 'users.id', 'data_n_keterampilan.id_siswa')
            ->select('data_n_keterampilan.*', 'name')
            ->where('id', auth()->user()->id)
            ->orderBy('id_keterampilan', 'desc')
            ->get();

        return datatables()
            ->of($data_keterampilan)
            ->addIndexColumn()
            ->make(true);
    }
}
