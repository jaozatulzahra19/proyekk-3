@extends('admin.masters')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Data Penyakit</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('penyakit.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="kodePenyakit" class="col-md-4 col-form-label text-md-right">Kode Penyakit</label>

                                <div class="col-md-6">
                                    <input id="kodePenyakit" type="text" class="form-control @error('kodePenyakit') is-invalid @enderror" name="kodePenyakit" value="{{ old('kodePenyakit') }}" required autocomplete="kodePenyakit" autofocus>

                                    @error('kodePenyakit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="penyakit" class="col-md-4 col-form-label text-md-right">Penyakit</label>

                                <div class="col-md-6">
                                    <input id="penyakit" type="text" class="form-control @error('penyakit') is-invalid @enderror" name="penyakit" value="{{ old('penyakit') }}" required autocomplete="penyakit" autofocus>

                                    @error('penyakit')
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