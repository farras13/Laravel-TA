@extends('master')
@section('titel') Form Trans 3 @endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Trans 3</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('trans3') }}">Trans 3</a></li>
        <li class="breadcrumb-item active">Form-Proses</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('trans3/add') }}" class="form-row" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="">Persilangan</label>
                    <input type="text" class="form-control" list="silang" name="persilangan" required>
                    <datalist id="silang">
                        @foreach ($silang as $d)
                            @if ($d->status_pk == 1 && $d->status_pb == 1 && $d->status_trans == 1 && $d->status_trans2 == 1 && $d->status_trans3 == 0)
                                <option value="{{ $d->kodePersilangan }}">{{ $d->tanaman['name'] .' x '. $d->tanamann['name'] }}</option>
                            @endif
                        @endforeach
                    </datalist>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="tgl">tanggal</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="target">Target</label>
                    <input type="number" name="target" id="target" class="form-control" min="0">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="jb">Jumlah Botol </label>
                    <input type="number" name="jb" id="jb" class="form-control" min="0">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" min="0">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kontam">kontam</label>
                    <input type="number" name="kontam" id="kontam" class="form-control" min="0">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="status">status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1">Berhasil</option>
                        <option value="2">Gagal</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ket">Keterangan</label>
                    <textarea class="form-control" name="ket" id="ket" cols="15" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                <a href="{{ route('trans3') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
              </form>
        </div>
    </div>
</div>
@endsection
