@extends('master')
@section('titel') Form Proses Buah @endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Panen Buah</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('panen') }}">Panen Buah</a></li>
        <li class="breadcrumb-item active">Form-Proses</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('kebun/panen/add') }}" class="form-row" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="">Persilangan</label>
                    <input type="text" class="form-control" list="silang" name="persilangan" required>
                    <datalist id="silang">
                        @foreach ($silang as $d)
                            @if ($d->status_pk == 1 && $d->status_pb == 0)
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
                <a href="{{ route('panen') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
              </form>
        </div>
    </div>
</div>
@endsection
