<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Surat;

class FormController extends Controller
{

    public function dashboard(Request $request)
    {
        return view('surat.dashboard');
    }
    public function list()
    {
        $surats = DB::table('surats')->get();
        return view('surat.list', ['surats' => $surats]);

        // $surats = Surat::all(); 
        // return view('surat.list', compact('surats'));
    }

    public function add(Request $request)
    {
        return view('surat.add');
    }

    public function store(Request $request)
    {

        Surat::create($request->all());

        return redirect()->route('form.list')->with('success', 'Post created successfully.');
    }

    public function show(Surat $post)
    {
        return view('form.list', compact('post'));
    }

    public function edit($id)
    {
        // Mencari data berdasarkan ID yang diberikan
        $data = Surat::findOrFail($id);

        // Mengirimkan data ke view
        return view('surat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_surat' => 'required',
            'jenis_surat' => 'required',
            'kode' => 'required',
            'berlaku' => 'required|date',
            'cabang_id' => 'required',
        ]);

        // Mencari data berdasarkan ID
        $data = Surat::findOrFail($id);

        // Memperbarui data yang ada dengan data baru
        $data->update($request->all());


        return redirect()->route('form.list')->with('success', 'Data berhasil diperbarui!');
    }


    public function destroy($id)
    {
        // Mencari data berdasarkan ID yang diberikan
        $data = Surat::findOrFail($id);

        // Menghapus data dari database
        $data->delete();

        // Mengarahkan kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('form.list')->with('success', 'Data berhasil dihapus!');
    }
}
