@extends('master')
@section('titel') Form Gen @endsection
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Gen</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('gen') }}">Gen</a></li>
        <li class="breadcrumb-item active">Form-Gen</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">

        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('gen/add') }}" class="form-row" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="gen">Nama Gen</label>
                    <input type="text" class="form-control" id="gen" name="gen" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
