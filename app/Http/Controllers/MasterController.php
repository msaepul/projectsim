<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cabang;

class MasterController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('master.dashboard');
    }
    public function data(Request $request)
    {
        return view('master.data');
    }
    public function cabang()
    {
        // Ambil semua data cabang
        $cabangs = Cabang::all();
    
        // Kirimkan ke view
        return view('master.cabang', compact('cabangs'));
    }
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'alamat_cabang' => 'required|string',
            'kode_cabang' => 'required|string|max:10',
        ]);

        // Simpan data ke database
        cabang::create($validatedData);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('master.cabang')->with('success', 'Data cabang berhasil ditambahkan!');
    }
    public function add(Request $request)
    {
        return view('master.add_cabang');
    }

    public function edit($id)
    {
        // Mencari data berdasarkan ID yang diberikan
        $data = canbang::findOrFail($id);

        // Mengirimkan data ke view
        return view('cabang.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_cabang' => 'required',
            'jenis_cabang' => 'required',
            'kode_cabang' => 'required',
        ]);

        // Mencari data berdasarkan ID
        $data = cabang::findOrFail($id);

        dd($data);  
        // Memperbarui data yang ada dengan data baru
        $data->update($request->all());


        return redirect()->route('master.cabang')->with('success', 'Data berhasil diperbarui!');
    }


    public function destroy($id)
    {
        // Mencari data berdasarkan ID yang diberikan
        $data = cabang::findOrFail($id);

        // Menghapus data dari database
        $data->delete();

        // Mengarahkan kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('master.cabang')->with('success', 'Data berhasil dihapus!');
    }
}
