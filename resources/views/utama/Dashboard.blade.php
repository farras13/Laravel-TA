@extends('master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <p class="mb-0">
                    <h5>Halo,  {{ Auth::user()->name }}</h5>
                    
                   <center>  <h3><--------- Coming Soon ---------></h3>  </center>
                </p>
            </div>
        </div>
        {{-- <div style="height: 100vh"></div> --}}
        {{-- <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div> --}}
    </div>
@endsection
