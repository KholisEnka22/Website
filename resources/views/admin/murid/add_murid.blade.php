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
            <form method="POST" action="{{route('murid.simpan')}}">
                <div class="row">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Murid</label>
                            <input type="name" class="form-control" id="nama" name="nama" placeholder="Nama Murid">
                        </div>
                        <div class="form-group">
                            <label for="nama">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="nama">TTL</label>
                            <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Ttl">
                        </div>
                        <div class="form-group">
                            <label for="kontingen">Tingkat</label>
                            <select class="form-control" name="ting_id" id="tingkat">
                                <option value="">Pilih Tingkat</option>
                                @foreach($tingkat as $ting)
                                <option value="{{ $ting->id }}">{{ $ting->nama_tgkt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kontingen">Kontingen</label>
                            <select class="form-control" name="kon_id" id="kontingen">
                                <option value="">Pilih Kontingen</option>
                                @foreach($kontingen as $kon)
                                <option value="{{ $kon->id }}">{{ $kon->nama_kon }}</option>
                                @endforeach
                            </select>
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