@extends('admin.masters')

@section('css')
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Data Pengguna</h1>

<!-- DataTales Example -->
<div class="card border-0 shadow rounded">
    <!-- <div class="card-body">
        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
    </div> -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($datapengguna as $user)
                    <tr>
                        <td>{{$loop -> iteration}}</td>
                        <td>{{$user -> id}}</td>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> email}}</td>
                        <td>
                            <a href="#" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection

@section('scripts')
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endsection