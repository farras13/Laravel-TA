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
            <form action="{{ url('akun/update', [$val->id]) }}" class="form-row" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="sed">Username</label>
                    <input type="text" class="form-control" id="sed" name="username" value="{{ $val->username }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="password" value="{{ $val->password }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="jk">Role</label>
                    <select class="form-control" name="role" id="jk">
                        <option value="0" {{ $val->role == 0 ? 'selected' : '' }}>Petugas Kebun</option>
                        <option value="1" {{ $val->role == 1 ? 'selected' : '' }}>Petugas Lab</option>
                        <option value="2" {{ $val->role == 2 ? 'selected' : '' }}>Admin</option>
                        <option value="3" {{ $val->role == 3 ? 'selected' : '' }}>Owner</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
