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
            <form action="{{ url('eksternal/in/add') }}" class="form-row" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="asal">Asal Barang</label>
                    <input type="text" name="asal" id="asal" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tgl">Tanggal</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" value="<?= date('Y-m-d') ?>">
                    {{-- <input type="time" name="tgl" id="tgl" class="form-control"> --}}

                </div>
                <div class="col-md-6 mb-3">
                    <label for="tm">Waktu</label>
                    <input type="time" name="tm" id="tm" class="form-control" value="<?= date('H:i') ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="nama">Nama Anggrek</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">gen</label>
                    <input type="text" class="form-control" list="silang" name="gen" required>
                    <datalist id="silang">
                        @foreach ($gen as $g)
                           <option value="{{ $g->idGen }}">{{ $g->gen }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jk">JK</label>
                    <select class="form-control" name="jk" id="jk">
                        <option value="seed">Seed</option>
                        <option value="pollen">Pollen</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="jb">Jumlah</label>
                    <input type="number" name="jb" id="jb" class="form-control" min="0">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="ket">Keterangan</label>
                    <textarea class="form-control" name="ket" id="ket" cols="15" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                <a href="{{ route('trans') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
              </form>
        </div>
    </div>
</div>
@endsection
