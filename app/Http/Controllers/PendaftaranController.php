<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran.index'); // Pastikan file Blade ini ada
    }
    public function submit(Request $request)
{
    // Validasi Data
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'telepon' => 'required'
    ]);

    // Simpan data atau kirim email (sesuai kebutuhan)
    return redirect()->route('pendaftaran.form')->with('status', 'Pendaftaran berhasil!');
}
}
