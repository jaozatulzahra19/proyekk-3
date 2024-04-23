@extends('admin.masters')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Rule') }}</div>

                    <div class="card-body">
                            <form action="{{ route('updaterule', $data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Penyakit</label>
                                    <select name="id_penyakit" class="form-control" required>
                                        <option value="" disabled>Pilih</option>
                                        @foreach ($penyakit as $row)
                                            <option value="{{ $row->id }}"
                                                @if ($row->id == $data->id_penyakit) selected @endif>
                                                {{ $row->kodePenyakit . ' - ' . $row->penyakit }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Daftar Gejala</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @php
                                                $gejalaCount = count($gejala);
                                                $halfCount = ceil($gejalaCount / 2);
                                            @endphp
                                            @foreach ($gejala as $index => $row)
                                                @if ($index < $halfCount)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="daftargejala[]"
                                                                value="{{ $row->kodeGejala }}"
                                                                @if (in_array($row->kodeGejala, explode(' - ', $data->daftargejala))) checked @endif>
                                                            {{ '(' . $row->kodeGejala . ') ' . $row->gejala }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            @foreach ($gejala as $index => $row)
                                                @if ($index >= $halfCount)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="daftargejala[]"
                                                                value="{{ $row->kodeGejala }}"
                                                                @if (in_array($row->kodeGejala, explode(' - ', $data->daftargejala))) checked @endif>
                                                            {{ '(' . $row->kodeGejala . ') ' . $row->gejala }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                 --}}
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                <a href="{{ route('indexrule') }}" class="btn btn-secondary">Batal</a>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
