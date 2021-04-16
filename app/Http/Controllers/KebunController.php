<?php

namespace App\Http\Controllers;

use App\Models\Panen;
use App\Models\Persilangan;
use App\Models\Proses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KebunController extends Controller
{
    public function index()
    {
        $data = Proses::all();
        return view('kebun.proses.index', compact('data'));
    }

    public function create()
    {
        $silang = Persilangan::all();
        return view('kebun.proses.create', compact('silang'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'persilangan' => 'required',
            'status' => 'required',
        ]);

        Proses::create([
            'idPersilangan' => $request->persilangan,
            'status' => $request->status,
            'keterangan' => $request->ket,
            'idAuth' => Auth::user()->id,
            'tanggal' => $request->tgl,
        ]);
        
        $edit = ['status_pk' => $request->status, ];
        $core =  Proses::find($request->persilangan);
        Persilangan::find($core->idPersilangan)->update($edit);

        return redirect()->route('proses')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Proses::find($id);
        $silang = Persilangan::all();
        return view('kebun.proses.edit', compact('data', 'silang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $data = [
            'status' => $request->status,
            'keterangan' => $request->ket
        ];
        Proses::find($id)->update($data);
        $edit = ['status_pk' => $request->status, ];
        $core =  Proses::find($id);
        Persilangan::find($core->idPersilangan)->update($edit);

        return redirect()->route('proses')
            ->with('success', 'Data Berhasil Di edit');
    }

    public function destroy($id)
    {
        Proses::find($id)->delete();
        $core =  Proses::find($id);
        $edit = ['status_pk' => 0, ];
        Persilangan::find($core->idPersilangan)->update($edit);
        return redirect()->route('proses')
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function panen()
    {
        $data = Panen::all();
        return view('kebun.panen.index', compact('data'));
    }

    public function createP()
    {
        $silang = Persilangan::all();
        return view('kebun.panen.create', compact('silang'));
    }

    public function addP(Request $request)
    {
        $request->validate([
            'persilangan' => 'required',
            'status' => 'required'
        ]);

        Panen::create([
            'idPersilangan' => $request->persilangan,
            'status' => $request->status,
            'keterangan' => $request->ket,
            'idAuth' => Auth::user()->id,
            'tanggal_pengerjaan' => $request->tgl,
            'tanggal_input' => $request->tgl,
        ]);
        $core =  Proses::find($request->persilangan);
        $edit = ['status_pb' => $request->status, ];
        Persilangan::find($core->idPersilangan)->update($edit);
        return redirect()->route('panen')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editP($id)
    {
        $data = Panen::find($id);
        return view('kebun.panen.edit', compact('data'));
    }

    public function updateP(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $data = [
            'status' => $request->status,
            'keterangan' => $request->ket,
            'tanggal_input' => $request->tgl,
        ];
        Panen::find($id)->update($data);
        $core =  Proses::find($id);
        $edit = ['status_pb' => $request->status, ];
        Persilangan::find($core->idPersilangan)->update($edit);
        return redirect()->route('panen')
            ->with('success', 'Data Berhasil Di edit');
    }

    public function destroyP($id)
    {
        Panen::find($id)->delete();
        $core =  Proses::find($id);
        $edit = ['status_pb' => 0, ];
        Persilangan::find($core->idPersilangan)->update($edit);
        return redirect()->route('panen')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
