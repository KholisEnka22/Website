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
            <form method="POST" action="{{route('ppp.simpan')}}" enctype="multipart/form-data">
                <div class="row">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_r">Nama Rayon</label>
                            <input type="name" class="form-control @error('nama_r') is-invalid @enderror"
                                value="{{old('nama_r')}}" id="nama_r" name="nama_r" placeholder="Nama Rayon">
                            @error('nama_r')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama_p">Nama Pelatih</label>
                            <input type="name" class="form-control @error('nama_p') is-invalid @enderror"
                                value="{{old('nama_p')}}" id="nama_p" name="nama_p" placeholder="Nama Pelatih">
                            @error('nama_p')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_tlp">No.Tlp Pelatih</label>
                            <input type="name" class="form-control @error('no_tlp') is-invalid @enderror"
                                value="{{old('no_tlp')}}" id="no_tlp" name="no_tlp" placeholder="No.Tlp Pelatih">
                            @error('no_tlp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jumlah_a">Jumlah Anggota</label>
                            <input type="name" class="form-control @error('jumlah_a') is-invalid @enderror"
                                value="{{old('jumlah_a')}}" id="jumlah_a" name="jumlah_a" placeholder="Jumlah Anggota">
                            @error('jumlah_a')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="thn_p">Thn Pembayaran</label>
                            <input type="name" class="form-control @error('thn_p') is-invalid @enderror"
                                value="{{old('thn_p')}}" id="thn_p" name="thn_p" placeholder="Tahun Pembayaran">
                            @error('thn_p')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bln_1">Pembayaran Pertama</label>
                            <input type="name" class="form-control @error('bln_1') is-invalid @enderror"
                                value="{{old('bln_1')}}" id="bln_1" name="bln_1" placeholder="Pembayaran Pertama">
                            @error('bln_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- 
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{old('bln_1')}}" id="bln_2">
                            <label class="form-check-label" for="flexCheckDefault">
                                Pembayaran Pertama
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{old('bln_2')}}" id="bln_2">
                            <label class="form-check-label" for="flexCheckDefault">
                              Pembayaran ke-2
                            </label>
                        </div> -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="name" class="form-control @error('status') is-invalid @enderror"
                                value="{{old('status')}}" id="status" name="status" placeholder="Status">
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="card-footer">
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