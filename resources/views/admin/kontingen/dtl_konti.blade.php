@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{$title}}</h3>
            <div class="card-tools">
                <a href="/murid/add_murid" type="button" class="btn btn-outline-light btn-sm"><i
                        class="fas fa-plus"></i>
                    add</a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th width="30px">No</th>
                        <th>Nama Murid</th>
                        <th>Alamat</th>
                        <th>TTL</th>
                        <th>Tingkat Sabuk</th>
                        <th width="100px">Action</th>
                    </tr>
                <tbody>
                    @foreach($murid as $no => $m)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$m->nama}}</td>
                        <td>{{$m->alamat}}</td>
                        <td>{{$m->ttl}}</td>
                        <td>{{$m->tingkat->nama_tgkt}}</td>
                        <td>
                            <a href="" class="btn btn-warning">Detail</a>
                        </td>
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