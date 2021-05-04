@extends('master')
@section('titel') Form Inventory @endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Inventory</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('gudang') }}">Inventory</a></li>
        <li class="breadcrumb-item active">Form-Inventory</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('gudang/add') }}" class="form-row" method="post" >
                @csrf
                <div class="col-md-6 mb-3">
                    <label for="">Kode Tanaman</label>
                    <input type="text" class="form-control" name="kode" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tgl">Tanggal</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gen">Gen</label>
                    <select name="gen" id="gen" class="form-control">
                        @foreach ($gen as $g)
                            <option value="{{ $g->idGen }}">{{ $g->gen }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jk">JK</label>
                    <select class="form-control" name="jk" id="jk">
                        <option value="seed">Seed</option>
                        <option value="pollen">Pollen</option>
                    </select>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control">
                </div>
                {{-- <div class="col-md-6 mb-4">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="internal">Internal</option>
                        <option value="internal">Eksternal</option>
                    </select>
                </div> --}}
                <div class="col-md-12 mb-3">
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                    </div>
                    <div class="col-md-12 mb-3">
                        <a href="{{ route('gudang') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
                    </div>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection
