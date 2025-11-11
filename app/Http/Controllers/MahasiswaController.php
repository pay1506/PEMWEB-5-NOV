<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan daftar mahasiswa.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(10);
        return view('table', compact('mahasiswa'));
    }

    /**
     * Tampilkan form tambah mahasiswa baru.
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Simpan data mahasiswa baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswa,nim',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswa,email',
            'alamat' => 'required|string',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('table')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit data mahasiswa.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('edit', compact('mahasiswa'));
    }

    /**
     * Perbarui data mahasiswa.
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswa,nim,' . $id,
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,' . $id,
            'alamat' => 'required|string',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('table')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Hapus data mahasiswa.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('table')->with('success', 'Data berhasil dihapus!');
    }
}
