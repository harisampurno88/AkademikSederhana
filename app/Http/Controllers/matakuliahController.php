<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class matakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = matakuliah::where('id_mk', 'like', "%$katakunci%")
                ->orWhere('nama_mk', 'like', "%$katakunci%")
                ->orWhere('sks', 'like', "%$katakunci%")
                ->orWhere('id_dosen', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = matakuliah::orderBy('id_mk', 'desc')->paginate(3);
        }
        return view('matakuliah.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosenList = dosen::all();
        return view('matakuliah.create', compact('dosenList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_mk', $request->id_mk);
        Session::flash('nama_mk', $request->nama_mk);
        Session::flash('sks', $request->sks);
        Session::flash('id_dosen', $request->id_dosen);

        $request->validate(
            [
                'id_mk' => 'required|integer|unique:matakuliah,id_mk',
                'nama_mk' => 'required|string|max:100',
                'sks' => 'required|string|max:100',
                'id_dosen' => 'required|integer|',
            ],
            [
                'id_mk.required' => 'ID matakuliah harus diisi',
                'id_mk.unique' => 'ID matakuliah sudah terdaftar',
                'nama_mk.required' => 'Nama harus diisi',
                'sks.required' => 'NIM harus diisi',
                'sks.string' => 'NIM harus berupa huruf',
                'id_dosen.required' => 'ID matakuliah harus diisi',
            ]
        );
        $data = [
            'id_mk' => $request->id_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'id_dosen' => $request->id_dosen,
        ];
        matakuliah::create($data);
        return redirect()->to('matakuliah')->with('success', 'Data matakuliah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosenList = dosen::all();
        $data = matakuliah::where('id_mk', $id)->first();

        return view('matakuliah.edit', compact('dosenList', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_mk' => 'required|string|max:100',
                'sks' => 'required|string|max:100',
                'id_dosen' => 'required|integer|',
            ],
            [
                'nama_mk.required' => 'Nama matakuliah harus diisi',
                'sks.required' => 'SKS harus diisi',
                'sks.string' => 'SKS harus berupa huruf',
                'id_dosen.required' => 'ID matakuliah harus diisi',
            ]
        );
        $data = [
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'id_dosen' => $request->id_dosen,
        ];
        matakuliah::where('id_mk', $id)->update($data);
        return redirect()->to('matakuliah')->with('success', 'Data matakuliah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matakuliah = matakuliah::where('id_mk', $id)->firstOrFail();

        if ($matakuliah->nilai()->exists()) {
            return redirect()->to('matakuliah')->with('error', 'Tidak bisa menghapus matakuliah karena masih memiliki Nilai');
        }

        matakuliah::where('id_mk', $id)->delete();
        return redirect()->to('matakuliah')->with('success', 'Data matakuliah berhasil dihapus');
    }
}
