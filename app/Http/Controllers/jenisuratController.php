<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;

class jenisuratController extends Controller
{
    public function index()
    {
        // Ambil data dari database menggunakan model
        $JenisSurat = JenisSurat::all();

        return view('master.jenissurat', compact('JenisSurat'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'nama_surat' => 'required|string|max:255',
            'jenis_surat' => 'required|in:pelatihan,tugas,keputusan',
            'kode_surat' => 'nullable|string|max:100',
            'keterangan' => 'required|string',
        ]);

        // Simpan data ke database menggunakan model
        JenisSurat::create($validated);

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->route('master.jenissurat')->with('success', 'Surat baru berhasil ditambahkan!');
    }

    public function edit(JenisSurat $JenisSurat)
       {
        // Mencari data berdasarkan ID yang diberikan
        $JenisSurat = JenisSurat    ::findOrFail($id);

        // Mengirimkan data ke view
        return view('master.jenissurat', compact('JenisSurat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_surat' => 'required|string|max:255',
            'jenis_surat' => 'required|in:pelatihan,tugas,keputusan',
            'kode_surat' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $JenisSurat = JenisSurat::findOrFail($id);
        $JenisSurat->fill($request->all());
        $JenisSurat->save();


        return redirect()->back()->with('success', 'Surat berhasil diubah ✅');
    }

    public function destroy($id)
    {
        // Mencari data berdasarkan ID yang diberikan
        $JenisSurat = JenisSurat::findOrFail($id);

        // Menghapus data dari database
        $JenisSurat->delete();

        // Mengarahkan kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('master.jenissurat')->with('success', 'Data berhasil dihapus!');
    }
}
