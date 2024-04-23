@extends('admin.masters')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit penyakit') }}</div>

                    <div class="card-body">
                        <form action="/datapenyakit/{{ $penyakit->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $penyakit->id }}">

                            <div class="form-group">
                                <label for="kodePenyakit">Kode Penyakit</label>
                                <input type="text" name="kodePenyakit" class="form-control @error('kodePenyakit') is-invalid @enderror" value="{{ old('kodePenyakit', $penyakit->kodePenyakit) }}" required autocomplete="kodePenyakit" autofocus>
                                @error('kodePenyakit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="penyakit">Nama penyakit</label>
                                <input type="text" name="penyakit" class="form-control @error('penyakit') is-invalid @enderror" value="{{ old('penyakit', $penyakit->penyakit) }}" required autocomplete="penyakit">
                                @error('penyakit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ url('/datapenyakit') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
