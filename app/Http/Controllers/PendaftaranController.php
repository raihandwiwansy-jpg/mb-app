<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    /**
     * Menyimpan data dari Form Pendaftaran Publik
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'asal_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'pernah_ikut' => 'required',
            'opsi_alat' => 'nullable|array',
            'bersedia_latihan' => 'required',
            'kesan_sebelumnya' => 'nullable|string',
            'alasan_bergabung' => 'required|string',
        ]);

        // Encode array alat menjadi json sebelum masuk database
        $validated['opsi_alat'] = json_encode($request->opsi_alat);

        DB::table('pendaftar')->insert($validated);

        return redirect()->back()->with('success', 'Pendaftaran kamu berhasil dikirim! Tetap semangat, ya!');
    }

    /**
     * Halaman Dashboard Admin untuk melihat data pendaftar
     */
    public function index()
    {
        $pendaftar = DB::table('pendaftar')->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('pendaftar'));
    }

    /**
     * Menghapus data pendaftar secara permanen (Fitur Baru)
     */
    public function destroy($id)
    {
        // Cari data berdasarkan ID, lalu hapus
        DB::table('pendaftar')->where('id', $id)->delete();

        // Kembalikan ke halaman dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data pendaftar berhasil dihapus!');
    }
}
