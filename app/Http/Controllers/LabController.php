<?php

namespace App\Http\Controllers;

use App\Models\Gen;
use App\Models\Persilangan;
use App\Models\trans;
use App\Models\trans2;
use App\Models\trans3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    public function index()
    {
        $data = trans::all();
        return view('lab.1.index', compact('data'));
    }

    public function create()
    {
        $silang = Persilangan::all();
        return view('lab.1.create', compact('silang'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'persilangan' => 'required',
            'status' => 'required',
        ]);

        trans::create([
            'idPersilangan' => $request->persilangan,
            'status' => $request->status,
            'jumlah_botol' => $request->jb,
            'keterangan' => $request->ket,
            'idAuth' => Auth::user()->id,
            'tgl_pengerjaan' => $request->tgl,
        ]);

        $edit = ['status_trans' => $request->status, ];
        $id = $request->persilangan;
        Persilangan::find($id)->update($edit);

        return redirect()->route('trans')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = trans::find($id);
        return view('lab.1.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $data = [
            'status' => $request->status,
            'jumlah_botol' => $request->jb,
            'keterangan' => $request->ket
        ];

        trans::find($id)->update($data);
        $edit = ['status_trans' => $request->status, ];
        $core =  trans::find($id);
        Persilangan::find($core->idPersilangan)->update($edit);

        return redirect()->route('trans')
            ->with('success', 'Data Berhasil Di edit');
    }

    public function destroy($id)
    {
        $core =  trans::find($id)->first();
        trans::find($id)->delete();
        $edit = ['status_trans' => 0, 'status_trans2' => 0, 'status_trans3' => 0,];
        Persilangan::find($core->idPersilangan)->update($edit);
        return redirect()->route('trans')
            ->with('success', 'Data Berhasil Dihapus');
    }
    public function trans2()
    {
        $data = trans2::all();
        return view('lab.2.index', compact('data'));
    }
    public function create2()
    {
        $silang = Persilangan::all();
        $trans = trans::orderBy('idPersilangan', 'desc')->get();
        $gen = Gen::all();
        return view('lab.2.create', compact('silang', 'gen', 'trans'));
    }

    public function add2(Request $request)
    {
        $request->validate([
            'persilangan' => 'required',
            'status' => 'required',
        ]);

        trans2::create([
            'id_persilangan' => $request->persilangan,
            'status' => $request->status,
            'jumlah_botol' => $request->jb,
            'keterangan' => $request->ket,
            'idAuth' => Auth::user()->id,
            'tgl_pengerjaan' => $request->tgl,
        ]);

        $edit = [
            'status_trans2' => $request->status,
            'calon_kode' => $request->kt,
            'calon_nama' => $request->nt,
            'calon_gen' => $request->gt,
            'calon_jk' => $request->jk,
        ];
        $id = $request->persilangan;
        Persilangan::find($id)->update($edit);

        return redirect()->route('trans2')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit2($id)
    {
        $gen = Gen::all();
        $data = trans2::find($id);
        return view('lab.2.edit', compact('data', 'gen'));
    }

    public function update2(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $data = [
            'status' => $request->status,
            'jumlah_botol' => $request->jb,
            'keterangan' => $request->ket
        ];

        trans2::find($id)->update($data);
        $edit = [
            'status_trans2' => $request->status,
            'calon_kode' => $request->kt,
            'calon_nama' => $request->nt,
            'calon_gen' => $request->gt,
            'calon_jk' => $request->jk,
        ];
        $core =  trans2::find($id);
        Persilangan::find($core->id_persilangan)->update($edit);

        return redirect()->route('trans2')
            ->with('success', 'Data Berhasil Di edit');
    }

    public function destroy2($id)
    {
        $core =  trans2::find($id);
        trans2::find($id)->delete();
        $edit = ['status_trans2' => 0, 'status_trans3' => 0,];
        Persilangan::find($core->id_persilangan)->update($edit);
        return redirect()->route('trans2')
            ->with('success', 'Data Berhasil Dihapus');
    }
    public function trans3()
    {
       $data = trans3::all();
       return view('lab.3.index', compact('data'));
    }
    public function create3()
    {
        $silang = Persilangan::all();
        return view('lab.3.create', compact('silang'));
    }

    public function add3(Request $request)
    {
        $request->validate([
            'persilangan' => 'required',
            'status' => 'required',
        ]);

        trans3::create([
            'id_persilangan' => $request->persilangan,
            'status' => $request->status,
            'target' => $request->target,
            'botolT2' => $request->jb,
            'stok' => $request->stok,
            'kontam' => $request->kontam,
            'keterangan' => $request->ket,
            'idAuth' => Auth::user()->id,
            'tgl_pengerjaan' => $request->tgl,
        ]);

        $edit = ['status_trans3' => $request->status, ];
        $id = $request->persilangan;
        Persilangan::find($id)->update($edit);

        return redirect()->route('trans3')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit3($id)
    {
        $data = trans3::find($id);
        return view('lab.3.edit', compact('data'));
    }

    public function update3(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $data = [
            'status' => $request->status,
            'target' => $request->target,
            'botolT2' => $request->jb,
            'stok' => $request->stok,
            'kontam' => $request->kontam,
            'keterangan' => $request->ket
        ];

        trans3::find($id)->update($data);
        $edit = ['status_trans3' => $request->status, ];
        $core =  trans3::find($id);
        Persilangan::find($core->id_persilangan)->update($edit);

        return redirect()->route('trans3')
            ->with('success', 'Data Berhasil Di edit');
    }

    public function destroy3($id)
    {
        trans3::find($id)->delete();
        $core =  trans3::find($id);
        $edit = ['status_trans3' => 0,];
        Persilangan::find($core->id_persilangan)->update($edit);
        return redirect()->route('trans3')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
