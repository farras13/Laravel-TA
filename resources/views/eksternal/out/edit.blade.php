@extends('master')
@section('titel') Form Lab @endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Trans 1</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('trans') }}">trans</a></li>
        <li class="breadcrumb-item active">Form-trans</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('eksternal/out/update', [$data->id]) }}" class="form-row" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="asal">Asal Barang</label>
                    <input type="text" name="asal" id="asal" class="form-control" value="{{ $data->asju }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tgl">Tanggal</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" value="{{ date('Y-m-d', strtotime($data->tanggal_keluar)) }}">


                </div>
                <div class="col-md-6 mb-3">
                    <label for="tm">Waktu</label>
                    <input type="time" name="tm" id="tm" class="form-control" value="{{ date('H:i', strtotime($data->tanggal_keluar)) }}">
                </div>

                <div class="col-md-12 form-group" id="test">
                    <div class="col-md-12 mb-3">
                        <label for="nama">Name Tanaman</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="gen">Gen</label>
                        <input type="text" name="gen" id="gen" class="form-control" value="{{ $data->gen }}" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="jk">JK</label>
                        <input type="text" name="jk" id="jk" class="form-control" value="{{ $data->jk }}" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="jb">Jumlah</label>
                        <input type="number" name="jb" id="jb" class="form-control" value="{{ $data->jumlah }}" min="0">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="ket">Keterangan</label>
                        <textarea class="form-control" name="ket" id="ket" cols="15" rows="10">{{ $data->keterangan }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                <a href="{{ route('trans') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
              </form>
        </div>
    </div>
</div>
@endsection
