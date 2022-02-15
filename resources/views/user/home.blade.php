@extends('layouts.backend')

@section('content')
<!-- <div class="alert alert-danger  role=" alert">
    Anda belum verifikasi Email,
    @csrf
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: white;">verifikasi ulang.</button>
</div> -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <p>{{ session('status') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection