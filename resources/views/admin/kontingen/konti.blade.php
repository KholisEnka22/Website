@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{$title}}</h3>
            <div class="card-tools">
                <a href="/kontingen/add_kontingen" type="button" class="btn btn-outline-light btn-sm"><i
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
                        <th>Nama Kontingen</th>
                        <th width="140px">Banyak Anggota</th>
                        <th width="100px">Action</th>
                    </tr>
                <tbody>
                    @foreach($kontingen as $no => $konti)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$konti->nama_kon}}</td>
                        <!-- <td>{{$murid->where('kon_id', $konti->id)->count()}}</td> -->
                        <td>{{$count}}</td>
                        <td>
                            <a href="{{url('/kontingen/dtl_kontingen', $konti->id)}}" class="btn btn-warning">Detail</a>
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