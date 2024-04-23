@extends('admin.masters')

@section('css')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Diagnosa Penyakit</h1>

        <!-- DataTales Example -->
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                    Tambah Diagnosa
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pasien</th>
                                <th>Tanggal</th>
                                <th>Gejala</th>
                                <th>Penyakit Anda</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Pasien</th>
                                <th>Tanggal</th>
                                <th>Gejala</th>
                                <th>Penyakit Anda</th>
                                <th>Hapus</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $nom = 1;
                            @endphp
                            @foreach ($data as $row)
                                <tr>
                                    <th class="text-center">{{ $nom++ }}</th>
                                    <td class="text-center">{{ $row->user->name }}</td>
                                    <td class="text-center">{{ $row->created_at->format('d F Y') }}</td>
                                    <td class="text-center">
                                        {{ str_replace(',', ' - ', str_replace('"', '', str_replace(str_split('[]'), '', $row->gejala))) }}
                                    </td>
                                    <td class="text-center">{{ $row->penyakits->penyakit }}</td>
                                    <td>
                                        <form action="{{ route('destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Diagnosa Penyakit Kulit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('insertdiagnosa') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Pilih Pasien</label>
                            <select name="user_id" class="form-control" required>
                                <option value="" disabled selected>Pilih</option>
                                @foreach ($user as $row)
                                    <option value="{{ $row->id }}">
                                        {{ $row->name . ' (' . $row->email . ')' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Diagnosa</label>
                        <div class="row">
                            @foreach ($gejala as $gej)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>{{ $gej->id }}. Apakah kamu mengalami gejala
                                            {{ $gej->gejala }}?</p>
                                        <div class="checkbox">
                                            <p style="display: inline-block; margin-right: 10px;">
                                                <input type="checkbox" name="gejala[]" value="{{ $gej->kodeGejala }}">
                                                Ya
                                            </p>
                                            <p style="display: inline-block;">
                                                <input type="checkbox">
                                                Tidak
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
@endsection
