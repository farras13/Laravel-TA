@extends('master')
@section('content')
        <div class="container-fluid"><br>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Form Register</h3>
                </div>
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for=""><strong>Nama Lengkap</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Username</strong></label>
                        <input type="text" name="username" class="form-control" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Konfirmasi Password</strong></label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Tanggal Lahir</strong></label>
                        <input type="date" name="lahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jk"><strong>Jenis Kelamin</strong></label>
                        <select class="form-control" name="jk" id="jk">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""><strong>No.Handphone</strong></label>
                        <input type="string" name="hp" class="form-control" placeholder="Nomor Handphone">
                    </div>
                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="15" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="role"><strong>Role</strong></label>
                        <select class="form-control" name="role" id="role">
                            <option value="3">Owner</option>
                            <option value="2">Admin</option>
                            <option value="0">Kebun</option>
                            <option value="1">Lab</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto"><strong>Foto</strong></label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    {{-- <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p> --}}
                </div>
                </form>
            </div>
        </div>
@endsection
