 @section('head')
     Data Nilai
 @endsection
 @extends('layout.template')
 <!-- START DATA -->
 @section('content')
     <div class="my-3 p-3 bg-body rounded shadow-sm">
         <!-- FORM PENCARIAN -->
         <div class="pb-3">
             <form class="d-flex" action="{{ url('nilai') }}" method="get">
                 <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                     placeholder="Masukkan kata kunci" aria-label="Search">
                 <button class="btn btn-secondary" type="submit">Cari</button>
             </form>
         </div>

         <!-- TOMBOL TAMBAH DATA -->
         <div class="pb-3">
             <a href='{{ url('nilai/create') }}' class="btn btn-primary">+ Tambah Data</a>
         </div>

         <table class="table table-striped">
             <thead>
                 <tr>
                     <th class="col-md-1">NO</th>
                     <th class="col-md-2">Id nilai</th>
                     <th class="col-md-2">Id Mahasiswa</th>
                     <th class="col-md-2">Id MK</th>
                     <th class="col-md-2">Nilai QUIZ</th>
                     <th class="col-md-2">Nilai UTS</th>
                     <th class="col-md-2">Nilai UAS</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = $data->firstItem(); ?>
                 @foreach ($data as $item)
                     <tr>
                         <td>{{ $i }}</td>
                         <td>{{ $item->id_nilai }}</td>
                         <td>{{ $item->id_mahasiswa }}</td>
                         <td>{{ $item->id_mk }}</td>
                         <td>{{ $item->nilai_quiz }}</td>
                         <td>{{ $item->nilai_uts }}</td>
                         <td>{{ $item->nilai_uas }}</td>
                         <td class="d-inline-flex">
                             <a href='{{ url('nilai/' . $item->id_nilai . '/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                             <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('nilai/' . $item->id_nilai) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                 <button type="submit" name="submit" class="btn btn-danger btn-sm">
                                    Del
                                 </button>
                             </form>
                         </td>
                     </tr>
                     <?php $i++; ?>
                 @endforeach
             </tbody>
         </table>
         {{ $data->withQueryString()->links() }}

     </div>
 @endsection
 <!-- AKHIR DATA -->
