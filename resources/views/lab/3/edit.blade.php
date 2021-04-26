@extends('master')
@section('titel') Form Edit Lab @endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Trans 3</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('trans3') }}">Trans3</a></li>
        <li class="breadcrumb-item active">Form-Trans3</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('trans3/update', [$data->id_pt3]) }}" class="form-row" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="">Persilangan</label>
                    <input type="text" class="form-control" list="silang" name="persilangan" value="{{ $data->id_persilangan }}" readonly>
                    <small> {{ $data->persilangan->tanaman['name'] .' x '.$data->persilangan->tanamann['name'] }}</small>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="tgl">tanggal</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" value="{{ $data->tanggal_input }}" readonly>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="target">Target</label>
                    <input type="number" name="target" id="target" class="form-control" min="0" value="{{ $data->target }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="jb">Jumlah Botol </label>
                    <input type="number" name="jb" id="jb" class="form-control" min="0" value="{{ $data->botolT2 }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" min="0" value="{{ $data->stok }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kontam">kontam</label>
                    <input type="number" name="kontam" id="kontam" class="form-control" min="0" value="{{ $data->kontam }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="status">status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Berhasil</option>
                        <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>Gagal</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ket">Keterangan</label>
                    <textarea class="form-control" name="ket" id="ket" cols="15" rows="10">{{ $data->keterangan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                <a href="{{ route('trans3') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
              </form>
        </div>
    </div>
</div>
@endsection
