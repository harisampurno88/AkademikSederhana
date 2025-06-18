@section('head')
    Data Nilai
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('nilai') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('nilai') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_nilai" class="col-sm-2 col-form-label">Id nilai</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_nilai'
                                value="{{ Session::get('id_nilai') }}" id="id_nilai">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_mahasiswa" class="col-sm-2 col-form-label">Id Mahasiswa</label>
                        <div class="col-sm-10">
                            <select name="id_mahasiswa" id="id_mahasiswa" class="form-select">
                                <option value="">-- Pilih Id Mahasiswa --</option>
                                @forelse ($mahasiswaList as $mahasiswa)
                                    <option value="{{ $mahasiswa->id_mahasiswa }}"
                                        {{ (old('id_mahasiswa') ?? (Session::get('id_mahasiswa') ?? '')) == $mahasiswa->id_mahasiswa ? 'selected' : '' }}>
                                        {{ $mahasiswa->id_mahasiswa }}
                                    </option>
                                @empty
                                    <option disabled>Data mahasiswa belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_mk" class="col-sm-2 col-form-label">Id MK</label>
                        <div class="col-sm-10">
                            <select name="id_mk" id="id_mk" class="form-select">
                                <option value="">-- Pilih Id MK --</option>
                                @forelse ($mkList as $mk)
                                    <option value="{{ $mk->id_mk }}"
                                        {{ (old('id_mk') ?? (Session::get('id_mk') ?? '')) == $mk->id_mk ? 'selected' : '' }}>
                                        {{ $mk->id_mk }}
                                    </option>
                                @empty
                                    <option disabled>Data mk belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nilai_quiz" class="col-sm-2 col-form-label">Nilai Quiz</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nilai_quiz'
                                value="{{ Session::get('nilai_quiz') }}" id="nilai_quiz">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nilai_uts" class="col-sm-2 col-form-label">Nilai UTS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nilai_uts'
                                value="{{ Session::get('nilai_uts') }}" id="nilai_uts">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nilai_uas" class="col-sm-2 col-form-label">Nilai UAS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nilai_uas'
                                value="{{ Session::get('nilai_uas') }}" id="nilai_uas">
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
