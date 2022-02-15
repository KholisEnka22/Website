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
            <form method="POST" action="{{url('update_murid/'.$murid->id)}}" enctype="multipart/form-data">
                <div class="row">
                    {{ csrf_field() }}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="mrd_id">ID Murid</label>
                            <input type="text" class="form-control" id="mrd_id" name="mrd_id" value="{{$murid->mrd_id}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Murid</label>
                            <input type="name" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{$murid->nama}}">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat" value="{{$murid->alamat}}">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tmpt">Kota KeLahiran</label>
                            <input type="text" class="form-control @error('tmpt') is-invalid @enderror"
                                value="{{$murid->tmpt}}" id="tmpt" name="tmpt" placeholder="Tempat">
                            @error('tmpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker-here @error('tgl') is-invalid @enderror"
                                value="{{$murid->tgl}}" name="tgl" id="tgl" placeholder="DD-MM-YYYY" data-language='id'
                                data-multiple-dates-separator=", " data-position='top left' />
                        </div>
                        @error('tgl')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="tingkat">Tingkat</label>
                            <select class="form-control @error('ting_id') is-invalid @enderror" name="ting_id"
                                id="tingkat">
                                <option value="">Pilih Tingkat</option>
                                @foreach($tingkat as $ting)
                                <option value="{{ $ting->id }}"
                                    {{old('ting_id', $murid->ting_id) == $ting->id ? 'selected' : null}}>
                                    {{ $ting->nama_tgkt }}
                                </option>
                                @endforeach
                            </select>
                            @error('ting_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kontingen">Kontingen</label>
                            <select class="form-control @error('kon_id') is-invalid @enderror" name="kon_id"
                                id="kontingen">
                                <option value="">Pilih Kontingen</option>
                                @foreach($kontingen as $kon)
                                <option value="{{ $kon->id }}"
                                    {{old('kon_id', $murid->kon_id) == $kon->id ? 'selected' : null}}>
                                    {{ $kon->nama_kon }}
                                </option>
                                @endforeach
                            </select>
                            @error('kon_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Input Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                value="{{old('foto')}}" name="foto" style="height: auto;">
                        </div>
                        @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <img id="previewImg" src="{{asset('fotomurid/'.$murid->foto)}}" width="150px" height="200px"
                                alt="">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id" value="{{ $murid['id'] }}">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->

@endsection