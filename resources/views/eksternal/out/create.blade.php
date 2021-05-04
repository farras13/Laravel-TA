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
            <form action="{{ url('eksternal/out/add') }}" class="form-row" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="asal">Asal Barang</label>
                    <input type="text" name="asal" id="asal" class="form-control" required>
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
                    <label for="">Tanaman</label>
                    <input type="text" class="form-control" list="silang" name="idt" id="idt" required>
                    <datalist id="silang">
                        @foreach ($data as $d)
                           <option value="{{ $d->idTanaman }}">{{ $d->name }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="col-md-12 form-group" id="test">
                    <div class="col-md-12 mb-3">
                        <label for="idt">Id Tanaman</label>
                        <input type="text" name="idta" id="idta" class="form-control" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="nama">Name Tanaman</label>
                        <input type="text" name="nama" id="nama" class="form-control" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="gen">Gen</label>
                        <input type="text" name="gen" id="gen" class="form-control" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="jk">JK</label>
                        <input type="text" name="jk" id="jk" class="form-control" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="jb">Jumlah</label>
                        <input type="number" name="jb" id="jb" class="form-control" min="0">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="ket">Keterangan</label>
                        <textarea class="form-control" name="ket" id="ket" cols="15" rows="10"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                <a href="{{ route('trans') }}" class="btn btn-danger btn-block mb-2">Cancel</a>
              </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type='text/javascript'>

    $(document).ready(function(){
        $('#test').hide();
      // Department Change
      $('#idt').change(function(){

         // Department id
         var id = $(this).val();

         // Empty the dropdown
         $('#test').show();

         // AJAX request
         $.ajax({
           url: 'getData/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var ida = response['data'][i].idTanaman;
                 var name = response['data'][i].name;
                 var stok = response['data'][i].stok;
                 var jk = response['data'][i].jk;
                 var gen = response['data'][i].idGen;
                 var input = document.getElementById("jb");
                 document.getElementById("idta").value = ida;
                 document.getElementById("nama").value = name;
                 document.getElementById("gen").value = gen;
                 document.getElementById("jk").value = jk;
                 input.value = stok;
                 input.setAttribute("max", stok);

                //  $("#sel_emp").append(option);
               }
             }

           }
        });
      });

    });

    </script>
@endsection

