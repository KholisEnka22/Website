@extends('layouts.backend')

@section('content')

<!-- Profile Image -->
<div class="col-md-7">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="img-rounded img-bordered" src="{{asset('fotomurid/'.$murid->foto)}}"
                    alt="User profile picture" style="border-radius: 15%;" width="150px" height="200px">
            </div>

            <h3 class="profile-username text-center">{{$murid->nama}}</h3>

            <p class="text-muted text-center">{{$murid->mrd_id}}</p>
            <p class="text-muted text-center pt-0">{{$murid->kontingen->nama_kon}}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Tingkat Sabuk</b> <a class="float-right">{{$murid->tingkat->nama_tgkt}}</a>
                </li>
                <li class="list-group-item">
                    <b>TTL</b> <a class="float-right">{{$murid->tmpt}}, {{$murid->tgl}}</a>
                </li>
                <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right">{{$murid->alamat}}</a>
                </li>
            </ul>
            <small>
                <a>Updated at {{ $murid->updated_at->diffForHumans() }}.</a>
                <a class="float-right" style="text-decoration: underline;" href="{{'/murid'}}"> Back To Daftar
                    Murid....</a>
            </small>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection