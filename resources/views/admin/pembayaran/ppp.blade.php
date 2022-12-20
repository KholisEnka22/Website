@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{$title}}</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-outline-light btn-sm mr-2" data-toggle="modal"
                    data-target="#exampleModal1"><i class="fas fa-plus"></i>
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
                        <th>Nama Pembayaran</th>
                        <th>Tahun Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayaran as $no => $p)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>
                            <a href="{{ route('dtl_ppp', [$p->id, Str::slug($p->nama)]) }}" style="color: black;">
                                {{($p->nama)}}
                            </a>
                        </td>
                        <td>{{ tahunBulan($p->tahun->tahun_pertama) }} -
                            {{ tahunBulan($p->tahun->tahun_kedua) }}
                        </td>
                        <td>
                            <a href="#" class="delete" data-id="{{ $p->id }}" data-nama="{{ $p->nama }}" class="">
                                <i class="nav-icon fas fa-trash-alt" style="color: red;"></i>
                            </a>
                            |
                            <a href="{{ route('edit.pembayaran', [$p->id, Str::slug($p->nama)]) }}">
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

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('ppp.simpan')}}">
                    <div class="row">
                        {{ csrf_field() }}
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="nama">Nama Pembayaran</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}" name="nama" id="nama">
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thn_id" class="form-label">Tahun Angkatan</label>
                                <select class="form-control @error('thn_id') is-invalid @enderror"
                                    value="{{old('thn_id')}}" name="thn_id" id="thn_id">
                                    <option value="">Tahun Angkatan</option>
                                    @foreach($tahun as $thn)
                                    <option value="{{ $thn->id }}">{{ tahunBulan($thn->tahun_pertama) }} -
                                        {{ tahunBulan($thn->tahun_kedua) }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('thn_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- endModal -->

@endsection

@section('footer')

<script>
$('.delete').click(function() {
    var idpembayaran = $(this).attr('data-id');
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
            window.location = "/deleted/" + idpembayaran + ""
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