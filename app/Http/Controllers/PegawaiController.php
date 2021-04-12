<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pegawai.index', compact('data'));
    }
    public function create()
    {
        return view('login.register');
    }
    public function edit($id)
    {
        $val = User::find($id);
        return view('pegawai.edit',compact('val'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  => 'required',
            'hp'                    => 'required',
            'lahir'                 => 'required',
            'jk'                    => 'required',
            'alamat'                => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $input = $request->all();

        if ($image = $request->file('foto')) {
            $destinationPath = 'apalah/image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }else{
            unset($input['foto']);
        }

        $data = [
            'name' => $request->name,
            'lahir' => $request->lahir,
            'jk' => $request->jk,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'foto' =>  $profileImage,
        ];
        User::find($id)->update($data);
        return redirect()->route('pegawai')
                        ->with('success','Product updated successfully');
    }
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::find($id)->delete();
        return redirect()->route('pegawai')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
