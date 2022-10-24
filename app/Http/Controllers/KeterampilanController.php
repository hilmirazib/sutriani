<?php

namespace App\Http\Controllers;

use App\Models\DataNKeterampilan;
use App\Models\DataSiswa;
use Illuminate\Http\Request;

class KeterampilanController extends Controller
{
    public function index()
    {
        $data_siswa = DataSiswa::where('role_id', '2')->pluck('name', 'id');
        return view('keterampilan.index', compact('data_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $data_keterampilan = DataNKeterampilan::leftJoin('users', 'users.id', 'data_n_keterampilan.id_siswa')
            ->select('data_n_keterampilan.*', 'name')
            ->orderBy('id_keterampilan', 'desc')
            ->get();

        return datatables()
            ->of($data_keterampilan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data_keterampilan) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('data-keterampilan.update', $data_keterampilan->id_keterampilan) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('data-keterampilan.destroy', $data_keterampilan->id_keterampilan) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $data_keterampilan = new DataNKeterampilan();
        $data_keterampilan->id_siswa = $request->id_siswa;
        $data_keterampilan->nilai_praktik = $request->nilai_praktik;
        $data_keterampilan->nilai_proyek = $request->nilai_proyek;
        $data_keterampilan->save();
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
        $data_keterampilan = DataNKeterampilan::find($id);
        return response()->json($data_keterampilan);
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
        $data_keterampilan = DataNKeterampilan::find($id);
        $data_keterampilan->id_siswa = $request->id_siswa;
        $data_keterampilan->nilai_praktik = $request->nilai_praktik;
        $data_keterampilan->nilai_proyek = $request->nilai_proyek;
        $data_keterampilan->update();

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
        $data_keterampilan = DataNKeterampilan::find($id);
        $data_keterampilan->delete();

        return response(null, 204);
    }
}
