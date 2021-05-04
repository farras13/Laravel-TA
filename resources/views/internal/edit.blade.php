@extends('master')
@section('titel') Form Edit Lab @endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Trans 1</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('gudang') }}">inventory</a></li>
        <li class="breadcrumb-item active">Form-inventory</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('gudang/update', [$data->idTanaman]) }}" class="form-row" method="post">
                @csrf
                <div class="col-md-6 mb-3">
                    <label for="">Kode Tanaman</label>
                    <input type="text" class="form-control" name="kode" value="{{ $data->idTanaman }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->name }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gen">Gen</label>
                    <select name="gen" id="gen" class="form-control">
                        @foreach ($gen as $g)
                        <option value="{{ $g->idGen }}" {{ $data->idGen == $g->idGen ? 'selected' : '' }}>{{ $g->gen }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jk">JK</label>
                    <select class="form-control" name="jk" id="jk">
                        <option value="seed" {{ $data->jk == "seed" ? 'selected' : '' }}>Seed</option>
                        <option value="pollen" {{ $data->jk == "pollen" ? 'selected' : '' }}>Pollen</option>
                    </select>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" value="{{ $data->stok }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="internal" {{ $data->status == 'internal' ? 'selected' : '' }}>Internal</option>
                        <option value="eksternal" {{ $data->status == 'eksternal' ? 'selected' : '' }}>Eksternal</option>
                    </select>
                </div>
                <div class="col-md-12 mb-4"></div>
                <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                <a href="{{ route('trans') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
              </form>
        </div>
    </div>
</div>
@endsection
