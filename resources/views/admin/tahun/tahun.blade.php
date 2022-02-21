@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> {{ $title }}</h3>
                <div class="card-tools">
                    <!-- <a href="/add_tahun" type="button" class="btn btn-outline-light btn-sm"><i class="fas fa-plus"></i>
                            add</a> -->
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
                            <th width="30px">No</th>
                            <th>Tahun Angkatan</th>
                            <th>Jumlah Anggota</th>
                        </tr>
                    <tbody>
                        @foreach ($tahun as $no => $t)
                            <tr align="center">
                                <td scope="row">{{ ++$no }}</td>
                                <td>{{ tahunBulan($t->tahun_pertama) }} - {{ tahunBulan($t->tahun_kedua) }}</td>
                                <td>{{ $murid->where('thn_id', $t->id)->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->



    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/tahun_simpan">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tahun_pertama">Tahun Pertama</label>
                                    <input type="month" class="form-control @error('tahun_pertama') is-invalid @enderror"
                                        value="{{ old('tahun_pertama') }}" name="tahun_pertama" id="tahun_pertama">
                                    @error('tahun_pertama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tahun_kedua">Tahun Kedua</label>
                                    <input type="month" class="form-control @error('tahun_kedua') is-invalid @enderror"
                                        value="{{ old('tahun_kedua') }}" name="tahun_kedua" id="tahun_kedua">
                                    @error('tahun_kedua')
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

@endsection
