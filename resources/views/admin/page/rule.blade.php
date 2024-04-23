@extends('admin.masters')

@section('css')
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Kelola Data Rule</h1>
        <div class="card-header">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-add">
                <i class="fa fa-plus-circle"></i>
            </button>
        </div>
        <!-- DataTales Example -->
        <div class="card border-0 shadow rounded">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th>Daftar Gejala</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th>Daftar Gejala</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $nom = 1;
                            @endphp
                            @foreach ($data as $row)
                                @php
                                    $daftarGejala = explode(' - ', $row->daftargejala);
                                    $kodegejala = App\Models\Gejala::whereIn('id', $daftarGejala)
                                        ->pluck('kodegejala')
                                        ->toArray();
                                @endphp
                                <tr>
                                    <th class="text-center">{{ $nom++ }}</th>
                                    <td class="text-center">{{ $row->penyakits->kodePenyakit }}</td>
                                    <td class="text-center">{{ $row->penyakits->penyakit }}</td>
                                    <td class="text-center">
                                        {{-- {{ implode(' - ', $kodegejala) }} --}}
                                        {{ $row->daftargejala }}
                                    </td>
                                    <td>
                                        <a href="{{ route('editrule', $row->id) }}" class="btn btn-warning"><i
                                                class="fa-solid fa-edit"></i></a>
                                    </td>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Rule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('insertrule') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Penyakit</label>
                            <select name="id_penyakit" class="form-control" required>
                                <option value="" disabled selected>Pilih</option>
                                @foreach ($penyakit as $row)
                                    <option value="{{ $row->id }}">
                                        {{ $row->kodePenyakit . ' - ' . $row->penyakit }}</option>
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
                                                        value="{{ $row->kodeGejala }}">
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
                                                        value="{{ $row->kodeGejala }}">
                                                    {{ '(' . $row->kodeGejala . ') ' . $row->gejala }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
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


        {{-- </div> --}}
    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
@endsection
