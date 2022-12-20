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
            <form method="POST" action="{{ url('update_pembayaran/' . $pembayaran->id) }}">
                <div class="row">
                    {{ csrf_field() }}
                    <div class=" card-body">
                        <div class="form-group">
                            <label for="nama">Nama Murid</label>
                            <input type="name" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ $pembayaran->nama }}">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thn_id" class="form-label">Tahun Angkatan</label>
                            <select class="form-control @error('thn_id') is-invalid @enderror" name="thn_id"
                                id="thn_id">
                                <option value="">Tahun Angkatan</option>
                                @foreach($tahun as $thn)
                                <option value="{{ $thn->id }}"
                                    {{ old('thn_id', $pembayaran->thn_id) == $thn->id ? 'selected' : null }}>
                                    {{ tahunBulan($thn->tahun_pertama) }} -
                                    {{ tahunBulan($thn->tahun_kedua) }}
                                </option>
                                @endforeach
                            </select>
                            @error('thn_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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