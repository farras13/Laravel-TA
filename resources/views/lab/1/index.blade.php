@extends('master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Lab - Trans</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Lab</li>
            <li class="breadcrumb-item active"><a href="{{ url('trans') }}">trans</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-success float-right" href="{{ url('trans/tambah') }}">Tambah</a>
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
                                <th>Kode</th>
                                <th>Persilangan</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Author</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td> {{ $d->id_pt }} </td>
                                    <td> <?php $awal = substr("" . $d->idPersilangan, 0, 1); $teng = substr("" . $d->idPersilangan, 1, 2); $khir= substr("" . $d->idPersilangan, 3); ?>
                                          {{$awal.'-'.$teng.'-'.$khir }}
                                    </td>
                                    <td>{{ $d->persilangan->tanaman['name'].' x '.$d->persilangan->tanamann['name']}}</td>
                                    <td>{{ $d->jumlah_botol }} </td>
                                    <td>    @if($d->status == 1)
                                                Berhasil
                                            @else
                                                Gagal
                                            @endif
                                    </td>
                                    <td>{{ $d->keterangan }}</td>
                                    <td>{{ $d->user['name'] }}</td>
                                    <td>
                                        <a href="{{ url('trans/edit', [$d->id_pt]) }}">Edit</a>
                                        <a href="{{ url('trans/destroy', [$d->id_pt]) }}">hapus</a>
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
