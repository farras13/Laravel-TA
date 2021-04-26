@extends('master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Tabel Akun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Pegawai</li>
            <li class="breadcrumb-item active"><a href="{{ url('akun') }}">Data Akun</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                {{-- <a class="btn btn-success float-right" href="{{ url('pegawai/tambah') }}">Tambah</a> --}}
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if (!empty($data))
                <div class="table-responsive">
                    <table class="table table-border" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $per)
                                <tr>
                                    <td> {{ $per->id }} </td>
                                    <td> {{ $per->username }} </td>
                                    <td> {{ $per->password }} </td>
                                    <td>
                                        @if($per->role == 0)
                                            Petugas Kebun
                                        @elseif($per->role == 1)
                                            Petugas Lab
                                        @elseif($per->role == 2)
                                            Admin
                                        @else
                                            Owner
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('akun/edit', [$per->id]) }}">Edit</a>
                                        <a href="{{ url('pegawai/destroy', [$per->id]) }}">hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <center><p>Tidak ada data Akun</p></center>
                @endif
            </div>
        </div>
        {{-- <div style="height: 100vh"></div> --}}
        <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('apalah/dist/assets/demo/datatables-demo.js') }}"></script>
@endsection
