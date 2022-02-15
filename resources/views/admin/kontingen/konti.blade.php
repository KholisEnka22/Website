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
                        <th>Nama Rayon</th>
                        <th width="140px">Banyak Anggota</th>
                        <th width="100px">Action</th>
                    </tr>
                <tbody>
                    @foreach($kontingen as $no => $konti)
                    <tr align="center">
                        <td scope="row">{{++$no}}</td>
                        <td>
                            <a href="{{route('detail', [$konti->id,Str::slug($konti->nama_kon)])}}"
                                style="color: black;">
                                {{$konti->nama_kon}}
                            </a>
                        </td>
                        <td>{{$murid->where('kon_id', $konti->id)->count()}}</td>
                        <td>
                            <a href="#" class="deleted" data-id="{{$konti->id}}" data-nama="{{$konti->nama_kon}}"
                                class="">
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
                </thead>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->

@endsection