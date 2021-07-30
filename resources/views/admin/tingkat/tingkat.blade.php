@extends('layouts.backend')

@section('content')

<!-- Tingkat Badge -->

<div class="col-md-6">
    <div class="card card-green">
        <div class="card-header">
            <h3 class="card-title"> Tingkat Badge</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama Murid</th>
                        <th>Kontingen</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($murid as $no => $m)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$m->nama}}</td>
                        <td>{{$m->kontingen->nama_kon}}</td>
                        <td>{{$m->alamat}}</td>
                        <td>{{$m->tingkat->nama_tgkt}}</td>
                        <!-- <td>
                            <a href="" class="btn btn-warning">Detail</a>
                        </td> -->
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

<!-- // Tingkat Badge -->

<!-- Tingkat Putih -->

<div class="col-md-6">
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title"> Tingkat Putih</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama Murid</th>
                        <th>Kontingen</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($murid as $no => $m)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$m->nama}}</td>
                        <td>{{$m->kontingen->nama_kon}}</td>
                        <td>{{$m->alamat}}</td>
                        <td>
                            <a href="" class="btn btn-warning">Detail</a>
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

<!-- //Tingkat Putih -->

<!-- Tingkat Kuning -->

<div class="col-md-6">
    <div class="card card-yellow">
        <div class="card-header">
            <h3 class="card-title"> Tingkat Kuning</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama Murid</th>
                        <th>Kontingen</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($murid as $no => $m)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$m->nama}}</td>
                        <td>{{$m->kontingen->nama_kon}}</td>
                        <td>{{$m->alamat}}</td>
                        <td>
                            <a href="" class="btn btn-warning">Detail</a>
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

<!-- //Tingkat Kuning -->

<!-- Tingkat Merah -->

<div class="col-md-6">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"> Tingkat Merah</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama Murid</th>
                        <th>Kontingen</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($murid as $no => $m)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$m->nama}}</td>
                        <td>{{$m->kontingen->nama_kon}}</td>
                        <td>{{$m->alamat}}</td>
                        <td>
                            <a href="" class="btn btn-warning">Detail</a>
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

<!-- //Tingkat Merah -->

<!-- Tingkat Biru -->

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> Tingkat Biru</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama Murid</th>
                        <th>Kontingen</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($murid as $no => $m)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$m->nama}}</td>
                        <td>{{$m->kontingen->nama_kon}}</td>
                        <td>{{$m->alamat}}</td>
                        <td>
                            <a href="" class="btn btn-warning">Detail</a>
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

<!-- //Tingkat Biru -->

@endsection