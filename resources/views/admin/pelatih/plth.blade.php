@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{$title}}</h3>
            <div class="card-tools">
                <a href="/add_pelatih" type="button" class="btn btn-outline-light btn-sm"><i class="fas fa-plus"></i>
                    add</a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>ID Pelatih</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>TTL</th>
                        <th>Tingkat Sabuk</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelatih as $no => $p)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$p->plth_id}}</td>
                        <td>
                            <a href="{{route('dtl_murid',[$p->id,Str::slug($p->nama)])}}" style="color: black;">
                                {{$p->nama}}
                            </a>
                        </td>
                        <td>{{$p->alamat}}</td>
                        <td>{{$p->tmpt}}, {{$p->tgl}}</td>
                        <td>{{$p->tingkat->nama_tgkt}}</td>
                        <td>
                            <a href="#" class="deleted" data-id="{{$p->id}}" data-nama="{{$p->nama}}" class="">
                                <i class="nav-icon fas fa-trash-alt" style="color: red;"></i>
                            </a>
                            |
                            <a href="{{route('edit.murid',[$p->id,Str::slug($p->nama)])}}" class="">
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

@endsection