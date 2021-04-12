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
            <form action="{{ url('pegawai/update', [$val->id]) }}" class="form-row" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="sed">Nama Lengkap</label>
                    <input type="text" class="form-control" id="sed" name="name" value="{{ $val->name }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="lahir" name="lahir" value="{{ $val->lahir }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="form-control" name="jk" id="jk">
                        <option value="Pria" {{ $val->jk == "pria" ? 'selected' : '' }}>Pria</option>
                        <option value="Wanita" {{ $val->jk == "wanita" ? 'selected' : '' }}>Wanita</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="hp">No. Hp</label>
                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $val->hp }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="sed">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="20" rows="10">{{ $val->alamat }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
