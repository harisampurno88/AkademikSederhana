<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = dosen::where('id_dosen', 'like', "%$katakunci%")
                ->orWhere('nama_dosen', 'like', "%$katakunci%")
                ->orWhere('nip', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = dosen::orderBy('id_dosen', 'desc')->paginate(3);
        }
        return view('dosen.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_dosen', $request->id_dosen);
        Session::flash('nama_dosen', $request->nama_dosen);
        Session::flash('nip', $request->nip);

        $request->validate(
            [
                'id_dosen' => 'required|integer|unique:dosen,id_dosen',
                'nama_dosen' => 'required|string|max:100',
                'nip' => 'required|string|max:20|',
            ],
            [
                'id_dosen.required' => 'ID dosen harus diisi',
                'id_dosen.integer' => 'ID dosen harus berupa angka',
                'id_dosen.unique' => 'ID dosen sudah terdaftar',
                'nama_dosen.required' => 'Nama harus diisi',
                'nama_dosen.string' => 'Nama harus berupa huruf',
                'nip.required' => 'NIP harus diisi',
                'nip.string' => 'NIP harus berupa huruf',
            ]
        );
        $data = [
            'id_dosen' => $request->id_dosen,
            'nama_dosen' => $request->nama_dosen,
            'nip' => $request->nip,
        ];
        dosen::create($data);
        return redirect()->to('dosen')->with('success', 'Data dosen berhasil disimpan');
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
        $data = dosen::where('id_dosen', $id)->first();
        return view('dosen.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate(
            [
                'nama_dosen' => 'required|string|max:100',
                'nip' => 'required|string|max:20',
            ],
            [
                'nama_dosen.required' => 'Nama harus diisi',
                'nama_dosen.string' => 'Nama harus berupa huruf',
                'nip.required' => 'NIP harus diisi',
                'nip.string' => 'NIP harus berupa huruf',
            ]
        );
        $data = [
            'nama_dosen' => $request->nama_dosen,
            'nip' => $request->nip,
        ];
        dosen::where('id_dosen', $id)->update($data);
        return redirect()->to('dosen')->with('success', 'Data dosen berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dosen::where('id_dosen', $id)->delete();
        return redirect()->to('dosen')->with('success', 'Data dosen berhasil dihapus');
    }
}
