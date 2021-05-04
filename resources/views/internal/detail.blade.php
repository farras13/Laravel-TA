@extends('master')
@section('titel') Detail Tanaman @endsection
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Inventory</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('gudang') }}">inventory</a></li>
        </ol>
        <div class="row">
        <div class="col-md-12 mb-3" >
            <div class="card mb-4">
            <div class="card-header">Riwayat Persilangan</div>
                <div class="card-body">
                    @if (!empty($persilangan))
                    <div class="table-responsive">
                        <table class="table table-border" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Persilangan</th>
                                    <th>Tanggal</th>
                                    <th>Seed</th>
                                    <th>Pollen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($persilangan as $p)
                                    <td>    1   </td>
                                    <td> {{ $p->kodePersilangan }} </td>
                                    <td> {{ $p->tanggal }}     </td>
                                    <td> {{ $p->tanaman->name }} </td>
                                    <td> {{ $p->tanamann->name }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                        <center><p>Tidak ada data</p></center>
                    @endif
                </div>
            </div>
        </div>
        </div>
        <div class="row">
        {{-- data masuk --}}
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">Data Masuk</div>
                <div class="card-body">
                    @if (!empty($cek))
                        <div class="table-responsive">
                            <table class="table table-border" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Asal</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($cek as $c)
                                            @if ($c->status == "Masuk")
                                                <td>    1   </td>
                                                <td> {{ $c->tanggal_masuk }} </td>
                                                <td> {{ $c->asju }}     </td>
                                                <td> {{ $c->jumlah }} </td>
                                                <td> {{ $c->keterangan }}</td>
                                            @else
                                                <td colspan="5"><center><p>Tidak ada data</p></center></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <center><p>Tidak ada data</p></center>
                    @endif
                </div>
            </div>
        </div>

        {{-- data kluar --}}
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">Data Keluar</div>
                <div class="card-body">
                    @if (!empty($cek))
                    <div class="table-responsive">
                        <table class="table table-border" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Tujuan</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($cek as $c)
                                        @if ($c->status == "Keluar")
                                            <td>    1   </td>
                                            <td> {{ $c->tanggal_keluar }} </td>
                                            <td> {{ $c->asju }}     </td>
                                            <td> {{ $c->jumlah }} </td>
                                            <td> {{ $c->keterangan }}</td>
                                        @else
                                            <td colspan="5"><center><p>Tidak ada data</p></center></td>
                                        @endif
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                        <center><p>Tidak ada data</p></center>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('apalah/dist/assets/demo/datatables-demo.js') }}"></script>
@endsection
