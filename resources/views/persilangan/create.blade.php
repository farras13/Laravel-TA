@extends('master')
@section('titel') Form Persilangan @endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Persilangan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('persilangan') }}">Persilangan</a></li>
        <li class="breadcrumb-item active">Form-Persilangan</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('persilangan/add   ') }}" class="form-row" method="post">
                @csrf
                <div class="col-md-6 mb-3">
                    <label for="sed">Seed</label>
                    <input type="text" class="form-control" id="sed" list="seed" name="seed" required>
                    <datalist id="seed">
                        @foreach ($data as $d)
                            @if ($d->jk == "seed")
                                <option value="{{ $d->idTanaman }}">{{ $d->name }}</option>
                            @endif
                        @endforeach
                    </datalist>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="polen">Pollen</label>
                    <input type="text" class="form-control" id="polen" list="pollen" name="pollen" required>
                    <datalist id="pollen">
                        @foreach ($data as $d)
                            @if ($d->jk == "pollen")
                                <option value="{{ $d->idTanaman }}">{{ $d->name }}</option>
                            @endif
                        @endforeach
                    </datalist>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="tgl">Tanggal</label>
                    <input type="date" class="form-control" id="tgl" name="tgl" value="<?= date('Y-m-d') ?>" required>
                </div>

                <button type="submit" class="btn btn-primary mb-2">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
