@extends('master')
@section('titel')
PT Sari Bumi Mulya - Form Data Masuk
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Inventory - Data Masuk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('gudang') }}">Gudang</a></li>
            <li class="breadcrumb-item">Eksternal</li>
            <li class="breadcrumb-item active"><a href="{{ url('eksternal/in/tambah') }}">Form - Data Masuk</a></li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('eksternal/in/update', [$data->id]) }}" class="form-row" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="asal">Asal Barang</label>
                    <input type="text" name="asal" id="asal" class="form-control" value="{{ $data->asju }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tgl">Tanggal</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" value="{{ date('Y-m-d', strtotime($data->tanggal_masuk)) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tm">Waktu</label>
                    <input type="time" name="tm" id="tm" class="form-control" value="{{ date('H:i', strtotime($data->tanggal_masuk)) }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="nama">Nama Anggrek</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gen">gen</label>
                    <select class="form-control" id="gen" name="gen" required>

                        @foreach ($gen as $g)
                         <option value="{{ $g->idGen }}" {{ $data->gen == $g->idGen ? 'selected' : '' }}>{{ $g->gen }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jk">JK</label>
                    <select class="form-control" name="jk" id="jk">
                        <option value="seed" {{ $data->jk == 'seed' ? 'selected' : '' }}>Seed</option>
                        <option value="pollen" {{ $data->jk == 'pollen' ? 'selected' : '' }}>Pollen</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="jb">Jumlah</label>
                    <input type="number" name="jb" id="jb" class="form-control" min="0" value="{{ $data->jumlah }}">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="ket">Keterangan</label>
                    <textarea class="form-control" name="ket" id="ket" cols="15" rows="10">{{ $data->keterangan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                <a href="{{ route('eksin') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
              </form>
        </div>
    </div>
</div>
@endsection
