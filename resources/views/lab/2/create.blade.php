@extends('master')
@section('titel') Form Lab @endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Trans 2</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('trans2') }}">trans2</a></li>
        <li class="breadcrumb-item active">Form-trans2</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('trans2/add') }}" class="form-row" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="">Persilangan</label>
                    <input type="text" class="form-control" list="silang" name="persilangan" required>
                    <datalist id="silang">
                        @foreach ($silang as $d)
                            @if ($d->status_pk == 1 && $d->status_pb == 1 && $d->status_trans == 0 )
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
                    <label for="jb">Jumlah botol berhasil</label>
                    <input type="number" name="jb" id="jb" class="form-control" min="0">
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
                <br><br>
                {{-- <h3>Penamaan untuk Gudang</h3> --}}

                <div class="col-md-6 mb-3">
                    <label for="kt">kode tanaman</label>
                    <input type="text" name="kt" id="kt" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nt">nama tanaman</label>
                    <input type="text" name="nt" id="nt" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gt">gen tanaman</label>
                    <select name="gt" id="gt" class="form-control">
                        @foreach ($gen as $g)
                            <option value="{{ $g->idGen }}">{{ $g->gen }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jk">seed / pollen</label>
                    <select name="jk" id="jk" class="form-control">
                        <option value="seed">Seed</option>
                        <option value="pollen">pollen</option>
                    </select>
                </select>
                </div>
                <div class="col-md-12 mb-3"></div>
                <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                <a href="{{ route('trans2') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
              </form>
        </div>
    </div>
</div>
@endsection
