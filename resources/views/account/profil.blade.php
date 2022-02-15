@extends('layouts.backend')

@section('content')
<div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('AdminLTE')}}/dist/img/satria0.png"
                    alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

            <p class="text-muted text-center">Admin Data Murid</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Jumlah Murid</b> <a class="float-right">{{$murid->count()}}</a>
                </li>
                <li class="list-group-item">
                    <b>Jumlah Rayon</b> <a class="float-right">{{$konti->count()}}</a>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- About Me Box -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">About Me</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Education</strong>

            <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

            <p class="text-muted">
                <span class="tag tag-danger">UI Design</span>
                <span class="tag tag-success">Coding</span>
                <span class="tag tag-info">Javascript</span>
                <span class="tag tag-warning">PHP</span>
                <span class="tag tag-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim
                neque.</p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li><a class="btn btn-primary">Settings</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <!-- /.tab-pane -->
            <form method="POST" action="{{route('account.profil')}}" class="form-horizontal">
                <div class="form-group row">
                    {{ csrf_field() }}

                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}"
                            placeholder="Nama Admin">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" value="{{ Auth::user()->email }}"
                            placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="role" placeholder="role">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Password Baru">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Konfimasi Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Konfirm Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </div>
            </form>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
</div>
<!-- /.card -->

@endsection