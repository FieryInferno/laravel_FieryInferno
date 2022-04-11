<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RumahSakit;

class PasienController extends Controller
{
  private $pasien;
  private $rumahSakit;

  public function __construct()
  {
    $this->pasien     = new Pasien;
    $this->rumahSakit = new RumahSakit;
  }

  public function index()
  {
    return view('pasien/index', [
      'pasien'  => $this->pasien->all(),
      'active'      => 'pasien',
      'title'       => 'Pasien',
    ]);
  }
  
  public function create()
  {
    return view('pasien/form', [
      'mode'        => 'add',
      'active'      => 'pasien',
      'title'       => 'Pasien',
      'rumahSakit'  => $this->rumahSakit->all(),
    ]);
  }
  
  public function store(Request $request)
  {
    $this->pasien->nama           = $request->nama;
    $this->pasien->alamat         = $request->alamat;
    $this->pasien->telepon        = $request->telepon;
    $this->pasien->rumah_sakit_id = $request->rumah_sakit_id;

    $this->pasien->save();

    return redirect('/pasien')->with('status', 'Berhasil tambah pasien.');
  }
  
  public function edit($id)
  {
    $pasien               = $this->pasien->find($id);
    $pasien['mode']       = 'edit';
    $pasien['active']     = 'pasien';
    $pasien['title']      = 'Rumah Sakit';
    $pasien['rumahSakit'] = $this->rumahSakit->all();
    return view('pasien/form', $pasien);
  }

  public function update(Request $request, $id)
  {
    $pasien_baru = $this->pasien->find($id);

    $pasien_baru->nama           = $request->nama;
    $pasien_baru->alamat         = $request->alamat;
    $pasien_baru->telepon        = $request->telepon;
    $pasien_baru->rumah_sakit_id = $request->rumah_sakit_id;

    $pasien_baru->save();

    return redirect('/pasien')->with('status', 'Berhasil edit pasien.');
  }
  
  public function destroy($id)
  {
    $pasien = $this->pasien->find($id);

    $pasien->delete();

    return response()->json(['data' => $this->pasien->all()]);
  }
}
