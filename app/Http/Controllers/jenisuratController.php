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
        return redirect()->route('master.jenissurat')->with('success', 'Data jenis surat berhasil ditambahkan!');
    }

    public function edit(JenisSurat $JenisSurat)
    {
        return view('master.jenissurat', compact('JenisSurat')); // Mengarahkan ke halaman yang sama untuk edit
    }

    public function update(Request $request, JenisSurat $jenisSurat)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'nama_surat' => 'required|string|max:255',
            'jenis_surat' => 'required|in:pelatihan,tugas,keputusan',
            'kode_surat' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        // Update data ke database
        $JenisSurat->update($validated);

        return redirect()->route('master.jenissurat')->with('success', 'Data jenis surat berhasil diperbarui!');
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
