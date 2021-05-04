@extends('master')
@section('titel')
PT Sari Bumi Mulya - Data Masuk
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Gudang - Data Masuk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('gudang') }}">Gudang</a></li>
            <li class="breadcrumb-item">Eksternal</li>
            <li class="breadcrumb-item active"><a href="{{ url('eksternal/in') }}">Data Masuk</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-success float-right" href="{{ url('eksternal/in/tambah') }}">Tambah</a>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <a  class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $message }}
                    </div>
                @endif
                @if (!empty($data))
                <div class="table-responsive">
                    <table class="table table-border" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Asal</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Author</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                                <?php $n = 1; ?>
                                @if ($d->status == "Masuk")
                                    <tr>
                                        <td> {{ $n }} </td>
                                        <td> {{ date('d-m-Y H:i', strtotime($d->tanggal_masuk)) }}</td>
                                        <td> {{ $d->asju }}</td>
                                        <td> {{ $d->nama }}</td>
                                        <td>{{ $d->jumlah }} </td>
                                        <td>{{ $d->keterangan }}</td>
                                        <td>{{ $d->user['name'] }}</td>
                                        <td>
                                            <a href="{{ url('eksternal/in/detail', [$d->id]) }}">Detail</a>
                                            <a href="{{ url('eksternal/in/edit', [$d->id]) }}">Edit</a>
                                            {{-- <a href="{{ url('eksternal/in/destroy', [$d->id]) }}">hapus</a> --}}
                                        </td>
                                    </tr>
                                @endif
                                <?php $n++; ?>
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
