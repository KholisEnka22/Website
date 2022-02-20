@extends('layouts.backend')

@section('content')

<!-- Tingkat Badge -->
@foreach ($tingkats as $tingkat)

@php
$tgkt = '';
switch ($tingkat->nama_tgkt) {
case 'Badge':
$tgkt = 'success';
break;
case 'Putih':
$tgkt = 'default';
break;
case 'Kuning':
$tgkt = 'warning';
break;
case 'Merah':
$tgkt = 'danger';
break;

default:
$tgkt = 'primary';
break;
}
@endphp

<div class="col-md-6">
    <div class="card card-{{ $tgkt }} shadow">
        <div class="card-header">
            <h3 class="card-title"> Tingkat {{ $tingkat->nama_tgkt }}</h3>
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
                    </tr>
                </thead>
                <tbody>

                    @foreach($murids->where('ting_id', $tingkat->id)->get() as $no => $m)
                    <tr align="center">
                        <th scope="row">{{++$no}}</th>
                        <td>{{$m->nama}}</td>
                        <td>{{$m->kontingen->nama_kon}}</td>
                        <td>{{$m->alamat}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endforeach

@endsection