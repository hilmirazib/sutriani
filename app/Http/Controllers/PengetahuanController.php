<?php

namespace App\Http\Controllers;

use App\Models\DataNPengetahuan;
use App\Models\DataSiswa;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class PengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_siswa = DataSiswa::where('role_id', '2')->pluck('name', 'id');
        $data_pelajaran = MataPelajaran::all()->pluck('nama_matkul', 'id_pelajaran');
        return view('pengetahuan.index', compact('data_siswa', 'data_pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $data_pengetahuan = DataNPengetahuan::leftJoin('users', 'users.id', 'data_n_pengetahuan.id_siswa')
            ->leftJoin('mata_pelajaran', 'mata_pelajaran.id_pelajaran', 'data_n_pengetahuan.id_pelajaran')
            ->select('data_n_pengetahuan.*', 'name', 'nama_matkul')
            ->orderBy('id_penilaian', 'desc')
            ->get();

        return datatables()
            ->of($data_pengetahuan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data_pengetahuan) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('data-pengetahuan.update', $data_pengetahuan->id_penilaian) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('data-pengetahuan.destroy', $data_pengetahuan->id_penilaian) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_pengetahuan = new DataNPengetahuan();
        $data_pengetahuan->id_penilaian = $request->id_penilaian;
        $data_pengetahuan->id_pelajaran = $request->id_pelajaran;
        $data_pengetahuan->id_siswa = $request->id_siswa;
        $data_pengetahuan->nilai_uh = $request->nilai_uh;
        $data_pengetahuan->nilai_uts = $request->nilai_uts;
        $data_pengetahuan->nilai_uas = $request->nilai_uas;
        $data_pengetahuan->save();
        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_pengetahuan = DataNPengetahuan::find($id);
        return response()->json($data_pengetahuan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_pengetahuan = DataNPengetahuan::find($id);
        $data_pengetahuan->id_pelajaran = $request->id_pelajaran;
        $data_pengetahuan->id_siswa = $request->id_siswa;
        $data_pengetahuan->nilai_uh = $request->nilai_uh;
        $data_pengetahuan->nilai_uts = $request->nilai_uts;
        $data_pengetahuan->nilai_uas = $request->nilai_uas;
        $data_pengetahuan->update();

        return response()->json('Data berhasil diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pengetahuan = DataNPengetahuan::find($id);
        $data_pengetahuan->delete();

        return response(null, 204);
    }
    public function member()
    {
        return view('pengetahuan.member');
    }
}
