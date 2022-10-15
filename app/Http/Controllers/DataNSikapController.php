<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Models\DataNSikap;

class DataNSikapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_siswa = DataSiswa::where('role_id', '2')->pluck('name', 'id');
        return view('datansikap.index', compact('data_siswa'));
    }
    public function data()
    {
        $data_n_sikap = DataNSikap::leftJoin('users', 'users.id', 'data_nilai_sikap.id_siswa')
            ->select('data_nilai_sikap.*', 'name')
            ->orderBy('id_n_sikap', 'desc')
            ->get();

        return datatables()
            ->of($data_n_sikap)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data_n_sikap) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('data-nilai-sikap.update', $data_n_sikap->id_n_sikap) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('data-nilai-sikap.destroy', $data_n_sikap->id_n_sikap) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data_n_sikap = new DataNSikap();
        $data_n_sikap->id_siswa = $request->id_siswa;
        $data_n_sikap->jujur = $request->jujur;
        $data_n_sikap->disiplin = $request->disiplin;
        $data_n_sikap->t_jawab = $request->t_jawab;
        $data_n_sikap->s_santun = $request->s_santun;
        $data_n_sikap->g_royong = $request->g_royong;
        $data_n_sikap->save();
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
        $data_n_sikap = DataNSikap::find($id);
        return response()->json($data_n_sikap);
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
        $data_n_sikap = DataNSikap::find($id);
        $data_n_sikap->id_siswa = $request->id_siswa;
        $data_n_sikap->jujur = $request->jujur;
        $data_n_sikap->disiplin = $request->disiplin;
        $data_n_sikap->t_jawab = $request->t_jawab;
        $data_n_sikap->s_santun = $request->s_santun;
        $data_n_sikap->g_royong = $request->g_royong;
        $data_n_sikap->update();

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
        $data_n_sikap = DataNSikap::find($id);
        $data_n_sikap->delete();

        return response(null, 204);
    }
    public function member()
    {
        return view('datansikap.member');
    }
}
