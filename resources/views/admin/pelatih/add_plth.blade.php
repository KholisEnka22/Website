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
            <form method="POST" action="{{route('pelatih.simpan')}}" enctype="multipart/form-data">
                <div class="row">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                value="{{old('nik')}}" name="nik" placeholder="Nomor Induk Keluarga">
                            @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="name" class="form-control @error('nama') is-invalid @enderror"
                                value="{{old('nama')}}" id="nama" name="nama" placeholder="Nama Lengkap">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="name" class="form-control @error('email') is-invalid @enderror"
                                value="{{old('email')}}" id="email" name="email" placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tingkat" class="form-label">Jenis Kelamin</label>
                            <select name="jns_klmin" class="form-control @error('jns_klmin') is-invalid @enderror">
                                <option>Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jns_klmin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                value="{{old('alamat')}}" id="alamat" name="alamat" placeholder="Alamat">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tmpt">Kota KeLahiran</label>
                            <input type="text" class="form-control @error('tmpt') is-invalid @enderror"
                                value="{{old('tmpt')}}" id="tmpt" name="tmpt" placeholder="Tempat">
                            @error('tmpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker-here @error('tgl') is-invalid @enderror"
                                value="{{old('tgl')}}" name="tgl" id="tgl" placeholder="DD-MM-YYYY" data-language='id'
                                data-multiple-dates-separator=", " data-position='top left' />
                        </div>
                        @error('tgl')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="tingkat" class="form-label">Tingkat</label>
                            <select class="form-control @error('ting_id') is-invalid @enderror"
                                value="{{old('ting_id')}}" name="ting_id" id="tingkat">
                                <option value="">Pilih Tingkat</option>
                                @foreach($tingkat as $ting)
                                <option value="{{ $ting->id }}">{{ $ting->nama_tgkt }}</option>
                                @endforeach
                            </select>
                            @error('ting_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Input Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                value="{{old('foto')}}" name="foto" style="height: auto;">
                            @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->

@endsection