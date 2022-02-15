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
            <div class="row">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group">
                        <label for="mrd_id">ID Murid</label>
                        <input type="text" class="form-control" id="mrd_id" name="mrd_id" value="">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Panjang</label>
                        <input type="name" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat" value="">
                        @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tmpt">Kota KeLahiran</label>
                        <input type="text" class="form-control @error('tmpt') is-invalid @enderror" value="" id="tmpt"
                            name="tmpt">
                        @error('tmpt')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal Lahir</label>
                        <input type="text" class="form-control datepicker-here @error('tgl') is-invalid @enderror"
                            value="" name="tgl" id="tgl" placeholder="DD-MM-YYYY" data-language='id'
                            data-multiple-dates-separator=", " data-position='top left' />
                    </div>
                    @error('tgl')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="name">Agama</label>
                        <input type="text" class="form-control datepicker-here @error('agm') is-invalid @enderror"
                            value="" name="agm" id="agm" placeholder="DD-MM-YYYY" data-language='id'
                            data-multiple-dates-separator=", " data-position='top left' />
                    </div>
                    @error('agm')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="name">NIK</label>
                        <input type="text" class="form-control datepicker-here @error('nik') is-invalid @enderror"
                            value="" name="nik" id="nik" placeholder="DD-MM-YYYY" data-language='id'
                            data-multiple-dates-separator=", " data-position='top left' />
                    </div>
                    @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="foto">Input Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" value="" name="foto"
                            style="height: auto;">
                    </div>
                    @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <img id="previewImg" src="" width="150px" height="200px" alt="">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" value="">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->

@endsection