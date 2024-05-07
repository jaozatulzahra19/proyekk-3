@extends('admin.masters')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Data Solusi</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('gejala.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="kodeGejala" class="col-md-4 col-form-label text-md-right">Nama Penyakit</label>

                                <div class="col-md-6">
                                    <input id="kodeGejala" type="text" class="form-control @error('kodeGejala') is-invalid @enderror" name="kodeGejala" value="{{ old('kodeGejala') }}" required autocomplete="kodeGejala" autofocus>

                                    @error('kodeGejala')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gejala" class="col-md-4 col-form-label text-md-right">gejala</label>

                                <div class="col-md-6">
                                    <input id="gejala" type="text" class="form-control @error('gejala') is-invalid @enderror" name="gejala" value="{{ old('gejala') }}" required autocomplete="gejala" autofocus>

                                    @error('gejala')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection