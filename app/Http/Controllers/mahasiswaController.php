<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = mahasiswa::where('id_mahasiswa', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('nim', 'like', "%$katakunci%")
                ->orWhere('jurusan', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = mahasiswa::orderBy('id_mahasiswa', 'desc')->paginate(3);
        }
        return view('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_mahasiswa', $request->id_mahasiswa);
        Session::flash('nama', $request->nama);
        Session::flash('nim', $request->nim);
        Session::flash('jurusan', $request->jurusan);

        $request->validate(
            [
                'id_mahasiswa' => 'required|integer|unique:mahasiswa,id_mahasiswa',
                'nama' => 'required|string|max:100',
                'nim' => 'required|string|max:20|unique:mahasiswa,nim',
                'jurusan' => 'required|string|max:50',
            ],
            [
                'id_mahasiswa.required' => 'ID Mahasiswa harus diisi',
                'id_mahasiswa.integer' => 'ID Mahasiswa harus berupa angka',
                'id_mahasiswa.unique' => 'ID Mahasiswa sudah terdaftar',
                'nama.required' => 'Nama harus diisi',
                'nama.string' => 'Nama harus berupa huruf',
                'nama.max' => 'Nama maksimal 100 karakter',
                'nim.required' => 'NIM harus diisi',
                'nim.string' => 'NIM harus berupa huruf',
                'nim.unique' => 'NIM sudah terdaftar',
                'jurusan.required' => 'Jurusan harus diisi',
                'jurusan.string' => 'Jurusan harus berupa huruf',
            ]
        );
        $data = [
            'id_mahasiswa' => $request->id_mahasiswa,
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Data Mahasiswa berhasil disimpan');
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
        $data = mahasiswa::where('id_mahasiswa', $id)->first();
        return view('mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate(
            [
                'nama' => 'required|string|max:100',
                'jurusan' => 'required|string|max:50',
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'nama.string' => 'Nama harus berupa huruf',
                'jurusan.required' => 'Jurusan harus diisi',
                'jurusan.string' => 'Jurusan harus berupa huruf',
            ]
        );
        $data = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
        ];
        mahasiswa::where('id_mahasiswa', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Data Mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $mahasiswa = mahasiswa::where('id_mahasiswa', $id)->firstOrFail();

        if ($mahasiswa->nilai()->exists()) {
            return redirect()->to('mahasiswa')->with('error', 'Tidak bisa menghapus mahasiswa karena masih memiliki nilai');
        }

        mahasiswa::where('id_mahasiswa', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
