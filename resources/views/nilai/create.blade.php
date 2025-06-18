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
                            <input type="text" class="form-control" name='id_mahasiswa'
                                value="{{ Session::get('id_mahasiswa') }}" id="id_mahasiswa">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_mk" class="col-sm-2 col-form-label">ID MK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_mk'
                                value="{{ Session::get('id_mk') }}" id="id_mk">
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
