@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" action="/konti_simpan">
                <div class="row">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kontingen">Nama Rayon</label>
                            <input type="name" class="form-control" id="kontingen" name="nama_kon"
                                placeholder="Nama Rayon">
                        </div>
                        <div class="form-group">
                            <label for="plth" class="form-label">Nama Pelatih</label>
                            <select class="form-control @error('id_plth') is-invalid @enderror"
                                value="{{old('id_plth')}}" name="id_plth">
                                <option value="">Pilih Pelatih</option>
                                @foreach($pelatih as $pel)
                                <option value="{{ $pel->id }}">{{ $pel->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_plth')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->

@endsection