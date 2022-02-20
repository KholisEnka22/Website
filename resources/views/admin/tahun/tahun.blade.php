@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{$title}}</h3>
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
                    @foreach($tahun as $no => $t)
                    <tr align="center">
                        <td scope="row">{{++$no}}</td>
                        <td>{{$t->tahun_pertama}} - {{$t->tahun_kedua}}</td>
                        <td>{{$murid->where('thn_id', $t->id)->count()}}</td>
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

@endsection