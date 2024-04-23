@extends('admin.masters')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Gejala') }}</div>

                    <div class="card-body">
                        <form action="/datagejala/{{ $gejala->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $gejala->id }}">

                            <div class="form-group">
                                <label for="kodeGejala">Kode Gejala</label>
                                <input type="text" name="kodeGejala" class="form-control @error('kodeGejala') is-invalid @enderror" value="{{ old('kodeGejala', $gejala->kodeGejala) }}" required autocomplete="kodeGejala" autofocus>
                                @error('kodeGejala')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gejala">Nama Gejala</label>
                                <input type="text" name="gejala" class="form-control @error('gejala') is-invalid @enderror" value="{{ old('gejala', $gejala->gejala) }}" required autocomplete="gejala">
                                @error('gejala')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ url('/datagejala') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
