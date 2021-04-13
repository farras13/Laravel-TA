<?php

namespace App\Http\Controllers;

use App\Models\Gen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('utama.Dashboard');
    }

    public function gen()
    {
        $data = Gen::all();
        return view('gen.index', compact('data'));
    }

    public function create()
    {
        return view('gen.create');
    }
    public function add(Request $request)
    {
        $request->validate(['gen' => 'required']);
        Gen::create([
            'gen' => $request->gen
        ]);
         //jika data berhasil ditambahkan, akan kembali ke halaman utama
         return redirect()->route('gen')
             ->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $data = Gen::find($id);
        return view('gen.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(['gen' => 'required']);
        Gen::find($id)->update(['gen' => $request->gen ]);
         //jika data berhasil ditambahkan, akan kembali ke halaman utama
         return redirect()->route('gen')
             ->with('success', 'Data Berhasil Ditambahkan');
    }
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        Gen::find($id)->delete();
        return redirect()->route('gen')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
