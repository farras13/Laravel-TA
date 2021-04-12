@extends('master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Static Navigation</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-success float-right" href="{{ url('persilangan/tambah') }}">Tambah</a>
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
                                <th>Kode</th>
                                <th>tanggal</th>
                                <th>seed</th>
                                <th>pollen</th>
                                <th>PK</th>
                                <th>PB</th>
                                <th>TRANS</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $per)
                                <tr>
                                    <td> {{ $per->kodePersilangan }} </td>
                                    <td>
                                        {{ $per->created_at }}
                                    </td>
                                    <td>
                                        {{ $per->tanaman->name }}
                                    </td>
                                    <td>
                                        {{ $per->tanamann->name }}
                                    </td>
                                    <td> {{ $per->status_pk }} </td>
                                    <td> {{ $per->status_pb }} </td>
                                    <td> {{ $per->status_trans }} </td>
                                    <td>
                                        <a href="{{ url('persilangan/edit', [$per->kodePersilangan]) }}">Edit</a>
                                        <a href="{{ url('persilangan/destroy', [$per->kodePersilangan]) }}">hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <center><p>Tidak ada data Persilangan</p></center>
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
