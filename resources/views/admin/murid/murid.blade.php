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
                        <th>No</th>
                        <th>ID Murid</th>
                        <th>Nama Murid</th>
                        <th>Kontingen</th>
                        <th>Alamat</th>
                        <th>TTL</th>
                        <th>Tingkat Sabuk</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($murid as $no => $m)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$m->mrd_id}}</td>
                        <td>
                            <a href="{{route('dtl_murid',[$m->id,Str::slug($m->nama)])}}" style="color: black;">
                                {{$m->nama}}
                            </a>
                        </td>
                        <td>{{$m->kontingen->nama_kon}}</td>
                        <td>{{$m->alamat}}</td>
                        <td>{{$m->tmpt}}, {{$m->tgl}}</td>
                        <td>{{$m->tingkat->nama_tgkt}}</td>
                        <td>
                            <a href="#" class="deleted" data-id="{{$m->id}}" data-nama="{{$m->nama}}" class="">
                                <i class="nav-icon fas fa-trash-alt" style="color: red;"></i>
                            </a>
                            |
                            <a href="{{route('edit.murid',[$m->id,Str::slug($m->nama)])}}" class="">
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