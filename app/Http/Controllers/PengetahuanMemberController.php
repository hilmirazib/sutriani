<?php

namespace App\Http\Controllers;

use App\Models\DataNPengetahuan;
use Illuminate\Http\Request;

class PengetahuanMemberController extends Controller
{
    public function member()
    {
        return view('pengetahuan.member');
    }
    public function data()
    {
        $data_pengetahuan = DataNPengetahuan::leftJoin('users', 'users.id', 'data_n_pengetahuan.id_siswa')
            ->leftJoin('mata_pelajaran', 'mata_pelajaran.id_pelajaran', 'data_n_pengetahuan.id_pelajaran')
            ->select('data_n_pengetahuan.*', 'name', 'nama_matkul')
            ->where('id', auth()->user()->id)
            ->orderBy('id_penilaian', 'desc')
            ->get();

        return datatables()
            ->of($data_pengetahuan)
            ->addIndexColumn()
            ->make(true);
    }
}
