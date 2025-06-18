<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\matakuliah;
use App\Models\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = nilai::where('id_nilai', 'like', "%$katakunci%")
                ->orWhere('id_mahasiswa', 'like', "%$katakunci%")
                ->orWhere('id_mk', 'like', "%$katakunci%")
                ->orWhere('nilai_quiz', 'like', "%$katakunci%")
                ->orWhere('nilai_uts', 'like', "%$katakunci%")
                ->orWhere('nilai_uas', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = nilai::orderBy('id_nilai', 'desc')->paginate(3);
        }
        return view('nilai.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mkList = matakuliah::all();
        $mahasiswaList = mahasiswa::all();
        return view('nilai.create', compact('mkList', 'mahasiswaList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_nilai', $request->id_nilai);
        Session::flash('id_mahasiswa', $request->id_mahasiswa);
        Session::flash('id_mk', $request->id_mk);
        Session::flash('nilai_quiz', $request->nilai_quiz);
        Session::flash('nilai_uts', $request->nilai_uts);
        Session::flash('nilai_uas', $request->nilai_uas);

        $request->validate(
            [
                'id_nilai' => 'required|integer|unique:nilai,id_nilai',
                'id_mahasiswa' => 'required|string',
                'id_mk' => 'required|string',
                'nilai_quiz' => 'required|string',
                'nilai_uts' => 'required|string',
                'nilai_uas' => 'required|string',
            ],
            [
                'id_nilai.required' => 'ID nilai harus diisi',
                'id_nilai.integer' => 'ID nilai harus berupa angka',
                'id_nilai.unique' => 'ID nilai sudah terdaftar',
                'id_mahasiswa.required' => 'Nama harus diisi',
                'id_mk.required' => 'NIM harus diisi',
                'nilai_quiz.required' => 'Jurusan harus diisi',
                'nilai_uts.required' => 'Nilai UTS harus diisi',
                'nilai_uas.required' => 'Nilai UAS harus diisi',
            ]
        );
        $data = [
            'id_nilai' => $request->id_nilai,
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_mk' => $request->id_mk,
            'nilai_quiz' => $request->nilai_quiz,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
        ];
        nilai::create($data);
        return redirect()->to('nilai')->with('success', 'Data nilai berhasil disimpan');
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
        $mkList = matakuliah::all();
        $mahasiswaList = mahasiswa::all();
        $data = nilai::where('id_nilai', $id)->first();

        return view('nilai.edit', compact('mkList', 'mahasiswaList' ,'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate(
            [
                'id_mahasiswa' => 'required|string',
                'id_mk' => 'required|string',
                'nilai_quiz' => 'required|string',
                'nilai_uts' => 'required|string',
                'nilai_uas' => 'required|string',
            ],
            [
                'id_mahasiswa.required' => 'Nama harus diisi',
                'id_mk.required' => 'NIM harus diisi',
                'nilai_quiz.required' => 'Jurusan harus diisi',
                'nilai_uts.required' => 'Nilai UTS harus diisi',
                'nilai_uas.required' => 'Nilai UAS harus diisi',
            ]
        );
        $data = [
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_mk' => $request->id_mk,
            'nilai_quiz' => $request->nilai_quiz,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
        ];
        nilai::where('id_nilai', $id)->update($data);
        return redirect()->to('nilai')->with('success', 'Data nilai berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        nilai::where('id_nilai', $id)->delete();
        return redirect()->to('nilai')->with('success', 'Data nilai berhasil dihapus');
    }
}
