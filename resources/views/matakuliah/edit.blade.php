@section('head')
    Data Mata Kuliah
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('matakuliah/' . $data->id_mk) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('matakuliah') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_mk" class="col-sm-2 col-form-label">Id MK</label>
                        <div class="col-sm-10">
                            {{ $data->id_mk }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_mk" class="col-sm-2 col-form-label">Nama MK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_mk' value="{{ $data->nama_mk }}"
                                id="nama_mk">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sks" class="col-sm-2 col-form-label">SKS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='sks' value="{{ $data->sks }}"
                                id="sks">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_dosen" class="col-sm-2 col-form-label">Id Dosen</label>
                        <div class="col-sm-10">
                            <select name="id_dosen" id="id_dosen" class="form-select">
                                <option value="">-- Pilih Id Dosen --</option>
                                @forelse ($dosenList as $dosen)
                                    <option value="{{ $dosen->id_dosen }}"
                                        {{ old('id_dosen', $data->id_dosen ?? '') == $dosen->id_dosen ? 'selected' : '' }}>
                                        {{ $dosen->id_dosen }}
                                    </option>
                                @empty
                                    <option disabled>Data dosen belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
        </div>
    </form>
@endsection
<!-- AKHIR FORM -->
