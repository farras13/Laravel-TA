@extends('master')
@section('titel')
PT Sari Bumi Mulya - Gudang
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Inventory</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('gudang') }}">inventory</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                {{-- <a class="btn btn-success float-right" href="{{ url('gudang/tambah') }}">Tambah</a> --}}
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
                                <th>no</th>
                                {{-- <th>Kode</th> --}}
                                <th>gen</th>
                                <th>nama</th>
                                <th>jk</th>
                                <th>stok</th>
                                <th>status</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n=1; ?>
                            @foreach($data as $d)
                                <tr>
                                    <td> {{ $n }} </td>
                                    {{-- <td> {{ $d->idTanaman }} </td> --}}
                                    <td> {{ $d->gen['gen'] }} </td>
                                    <td> {{ $d->name }}</td>
                                    <td> {{ $d->jk }} </td>
                                    <td>{{ $d->stok }}</td>
                                    <td>{{ $d->status }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('gudang/detail', [$d->idTanaman]) }}">Detail</a>
                                        {{-- <a class="btn btn-warning" href="{{ url('gudang/edit', [$d->idTanaman]) }}">Edit</a> --}}
                                        {{-- <a class="btn btn-danger" href="{{ url('gudang/destroy', [$d->idTanaman]) }}">hapus</a> --}}
                                    </td>
                                </tr>
                                <?php $n++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <center><p>Tidak ada data</p></center>
                @endif
            </div>
        </div>
        {{-- <div style="height: 100vh"></div> --}}
        {{-- <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div> --}}
    </div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('apalah/dist/assets/demo/datatables-demo.js') }}"></script>
@endsection
