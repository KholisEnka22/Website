@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{$title}}</h3>
            <div class="card-tools">
                <a href="/ppp/add_ppp" type="button" class="btn btn-outline-light btn-sm"><i class="fas fa-plus"></i>
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
                        <th>Nama Rayon</th>
                        <th>Nama Pelatih</th>
                        <th>No. Tlp</th>
                        <th>Jumlah Anggota</th>
                        <th>Thn Pembayaran</th>
                        <th>Bulan 1</th>
                        <th>Bulan 2</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayaran as $no => $m)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$m->nama_r}}</td>
                        <td>{{$m->nama_p}}</td>
                        <td>{{$m->no_tlp}}</td>
                        <td>{{$m->jumlah_a}}</td>
                        <td>{{$m->thn_p}}</td>
                        <td>{{$m->bln_1}}</td>
                        <td>{{$m->bln_2}}</td>
                        <td>{{$m->status}}</td>
                        <td>
                            <a href="#" class="deleted" data-id="{{$m->id}}" data-nama="{{$m->nama_r}}" class="">
                                <i class="nav-icon fas fa-trash-alt" style="color: red;"></i>
                            </a>
                            |
                            <a href="" class="">
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