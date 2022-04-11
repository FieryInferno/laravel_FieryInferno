<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;

class RumahSakitController extends Controller
{
  private $rumahSakit;

  public function __construct()
  {
    $this->rumahSakit = new RumahSakit;
  }

  public function index()
  {
    return view('rumahSakit/index', [
      'rumahSakit'  => $this->rumahSakit->all(),
      'active'      => 'rumahSakit',
      'title'       => 'Rumah Sakit',
    ]);
  }
  
  public function create()
  {
    return view('rumahSakit/form', [
      'mode'    => 'add',
      'active'  => 'rumahSakit',
      'title'   => 'Rumah Sakit',
    ]);
  }
  
  public function store(Request $request)
  {
    $this->rumahSakit->nama     = $request->nama;
    $this->rumahSakit->alamat   = $request->alamat;
    $this->rumahSakit->email    = $request->email;
    $this->rumahSakit->telepon  = $request->telepon;

    $this->rumahSakit->save();

    return redirect('/rumah_sakit')->with('status', 'Berhasil tambah rumah sakit.');
  }
  
  public function edit($id)
  {
    $rumahSakit           = $this->rumahSakit->find($id);
    $rumahSakit['mode']   = 'edit';
    $rumahSakit['active'] = 'rumahSakit';
    $rumahSakit['title']  = 'Rumah Sakit';
    return view('rumahSakit/form', $rumahSakit);
  }

  public function update(Request $request, $id)
  {
    $rumahSakit_baru = $this->rumahSakit->find($id);

    $rumahSakit_baru->nama     = $request->nama;
    $rumahSakit_baru->alamat   = $request->alamat;
    $rumahSakit_baru->email    = $request->email;
    $rumahSakit_baru->telepon  = $request->telepon;

    $rumahSakit_baru->save();

    return redirect('/rumah_sakit')->with('status', 'Berhasil edit rumah sakit.');
  }
  
  public function destroy($id)
  {
    $rumahSakit = $this->rumahSakit->find($id);

    $rumahSakit->delete();

    return response()->json(['data' => $this->rumahSakit->all()]);
  }
}
