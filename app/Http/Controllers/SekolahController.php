<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolah;

class SekolahController extends Controller
{
   public function index() {
        return view('sekolahs.index', [
            'sekolahs' => sekolah::get()
        ]);
    }

     public function tambah() 
     {
        return view('sekolahs.tambah');

    }
     public function store(Request $request) 
    {
      $sekolah = new sekolah();

      $sekolah->nama_sekolah = $request->nama_sekolah;
      $sekolah->alamat = $request->alamat;
      $sekolah->jurusan = $request->jurusan;
      $sekolah->jumlah_guru = $request->jumlah_guru;

      $sekolah->save();

      return redirect()->back();

      return redirect()->route('sekolahs.index');
}


public function edit($id)
{
    $sekolah = sekolah::find($id);

    return view('sekolahs.edit',[
        'sekolah'=>$sekolah,
    ]);
}

public function update(Request $request, $id) 
{
    $sekolah = sekolah::find($id);

    $sekolah->nama_sekolah = $request->nama_sekolah;
    $sekolah->alamat = $request->alamat;
    $sekolah->jurusan = $request->jurusan;
    $sekolah->jumlah_guru = $request->jumlah_guru;

    $sekolah->save();

    return redirect()->back();

    return redirect()->route('sekolahs.index');    
}

public function destroy($id) 
{
    $sekolah = sekolah::find($id);
    $sekolah->delete();
    return redirect()->route('sekolahs.index');
}
}