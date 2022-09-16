<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all()->pluck('nama', 'id_pengampu');
        return view('matapelajaran.index', compact('guru'));
    }
    public function data()
    {
        $mata_pelajaran = MataPelajaran::leftJoin('guru', 'guru.id_pengampu', 'mata_pelajaran.id_pengampu')
            ->select('mata_pelajaran.*', 'nama')
            ->orderBy('id_pelajaran', 'desc')
            ->get();

        return datatables()
            ->of($mata_pelajaran)
            ->addIndexColumn()
            ->addColumn('aksi', function ($mata_pelajaran) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('mata-pelajaran.update', $mata_pelajaran->id_pelajaran) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('mata-pelajaran.destroy', $mata_pelajaran->id_pelajaran) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $mata_pelajaran = new MataPelajaran();
        $mata_pelajaran->id_pengampu = $request->id_pengampu;
        $mata_pelajaran->nama_matkul = $request->nama_matkul;
        $mata_pelajaran->save();
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
        $mata_pelajaran = MataPelajaran::find($id);
        return response()->json($mata_pelajaran);
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
        $mata_pelajaran = MataPelajaran::find($id);
        $mata_pelajaran->id_pengampu = $request->id_pengampu;
        $mata_pelajaran->nama_matkul = $request->nama_matkul;
        $mata_pelajaran->update();

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
        $mata_pelajaran = MataPelajaran::find($id);
        $mata_pelajaran->delete();

        return response(null, 204);
    }
}
