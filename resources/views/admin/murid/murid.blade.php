@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{ $title }}</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-outline-light btn-sm mr-2" data-toggle="modal"
                    data-target="#exampleModal"><i class="fas fa-plus"></i>
                    Import XLS
                </a>
                <a href="/murid/add_murid" type="button" class="btn btn-outline-light btn-sm mr-2"><i
                        class="fas fa-plus"></i>
                    Add
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>ID Murid</th>
                        <th>Nama Murid</th>
                        <th>Rayon</th>
                        <th>Alamat</th>
                        <th>Angkatan</th>
                        <th>Tingkat Sabuk</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($murid as $no => $m)
                    <tr align="center">
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $m->mrd_id }}</td>
                        <td>
                            <a href="{{ route('dtl_murid', [$m->id, Str::slug($m->nama)]) }}" style="color: black;">
                                {{ $m->nama }}
                            </a>
                        </td>
                        <td>{{ $m->kontingen-> nama_kon }}</td>
                        <td>{{ $m->alamat }}</td>
                        <td>{{ tahunBulan($m->tahun->tahun_pertama) }} -
                            {{ tahunBulan($m->tahun->tahun_kedua) }}
                        </td>

                        <td>{{ $m->tingkat->nama_tgkt }}</td>
                        <td>
                            <a href="#" class="deleted" data-id="{{ $m->id }}" data-nama="{{ $m->nama }}" class="">
                                <i class="nav-icon fas fa-trash-alt" style="color: red;"></i>
                            </a>
                            |
                            <a href="{{ route('edit.murid', [$m->id, Str::slug($m->nama)]) }}" class="">
                                <i class="nav-icon fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('import.murid') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="file" name="file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                    <button type="submit" value="submit" class="btn btn-primary">Import</button>
                </div>
        </div>
        </form>
    </div>
</div>

@endsection

@section('footer')

<script>
$('.deleted').click(function() {
    var idmurid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');

    Swal.fire({
        title: 'Apakah Kamu Yakin?',
        text: "Kamu Yakin Menghapus " + nama + " !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/delete/" + idmurid + ""
            Swal.fire(
                'Deleted!',
                'Data Berhasil Dihapus.',
                'success',
            )
        }
    })
});
</script>

@stop