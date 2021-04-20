@extends('master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Lab - Trans</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item">Lab</li>
            <li class="breadcrumb-item active"><a href="index.html">trans</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-success float-right" href="{{ url('trans3/tambah') }}">Tambah</a>
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
                                <th>status</th>
                                <th>keterangan</th>
                                <th>penanggung jawab</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td> {{ $d->id_pt3 }} </td>
                                    <td> <?php $awal = substr("" . $d->id_persilangan, 0, 1); $teng = substr("" . $d->id_persilangan, 1, 2); $khir= substr("" . $d->id_persilangan, 3); ?>
                                          {{$awal.'-'.$teng.'-'.$khir }}
                                    </td>
                                    <td>{{ $d->persilangan->tanaman['name'].' x '.$d->persilangan->tanamann['name']}}</td>
                                    <td>    @if($d->status == 1)
                                                Berhasil
                                            @else
                                                Gagal
                                            @endif
                                    </td>
                                    <td>{{ $d->keterangan }}</td>
                                    <td>{{ $d->user['name'] }}</td>
                                    <td>
                                        <a href="{{ url('trans3/edit', [$d->id_pt3]) }}">Edit</a>
                                        <a href="{{ url('trans3/destroy', [$d->id_pt3]) }}">hapus</a>
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
