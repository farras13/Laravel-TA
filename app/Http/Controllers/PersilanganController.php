<?php

namespace App\Http\Controllers;

use App\Models\Persilangan;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PersilanganController extends Controller
{
    public function index()
    {
        $data = Persilangan::all();
        return view('persilangan.index', compact('data'));
    }

    public function create()
    {
        $data = Tanaman::all();
        return view('persilangan.create', compact('data'));
    }

    public function add(Request $request)
    {
        $rules = [
            'seed'          => 'required|string',
            'pollen'        => 'required|string'
        ];
        $messages = [
            'seed.required'     => 'Seed wajib diisi',
            'pollen.required'   => 'Pollen wajib diisi'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $x = DB::table('persilangan')->orderBy('tanggal','desc', 'kodePersilangan', 'desc')->first();
	    $count = strlen($x->kodePersilangan);
    		if ($count < 5) {
    			$yes = substr("" . $x->kodePersilangan, 0, 1);
    		}else{
    			$yes = substr("" . $x->kodePersilangan, 0, 2);
    		}
		$now = date('m');
            // print_r($x);die;
		if ($now != $yes) {
			$a = 1;
			$kode = "" . date('m') . date('y') . $a;
		} else {
			$kd = substr("" . $x->kodePersilangan, 0, 5);
			$kode = $kd + 1;
		}

        Persilangan::create([
            'kodePersilangan' => $kode,
            'tanggal' => $request->tgl,
            'seed' => $request->seed,
            'pollen' => $request->pollen,
            'idAuth' => Auth::user()->id
        ]);
         //jika data berhasil ditambahkan, akan kembali ke halaman utama
         return redirect()->route('persilangan')
             ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $val = Persilangan::find($id);
        $data = Tanaman::all();
        return view('persilangan.edit', compact('data', 'val'));
    }

    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'seed' => 'required',
            'pollen' => 'required'
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Persilangan::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('persilangan')
            ->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        Persilangan::find($id)->delete();
        return redirect()->route('persilangan')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
