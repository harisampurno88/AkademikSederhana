@section('head')
    Data Dosen
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('dosen/' . $data->id_dosen) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('dosen') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_dosen" class="col-sm-2 col-form-label">Id dosen</label>
                        <div class="col-sm-10">
                            {{ $data->id_dosen }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_dosen" class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_dosen' value="{{ $data->nama_dosen }}"
                                id="nama_dosen">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nip' value="{{ $data->nip }}"
                                id="nip">
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
