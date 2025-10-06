<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allKategori = Kategori::all(); // melakukan query untuk mendapatkan semua data kategori
        return view('kategori.index', compact('allKategori')); //compact untuk mengirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create'); //untuk menampilkan formulir data buku
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //memproses saat kita submit datanya
        //buat validasi
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100'
        ]);

        //simpan data ke database
        Kategori::create($validatedData);

        //redirect ke halaman index
        return redirect()->route('kategori.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //untuk menampilkan detail data kategori
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //menampilkan formulir edit data kategori 
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //mengupdet saat kita submit datanya
        //buat validasi
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100'
        ]);

        //update data ke database
        $kategori->update($validatedData);

        //redirect ke halaman index
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //menghapus data kategori
        $kategori->delete();

        //redirect ke halaman index
        return redirect()->route('kategori.index');
    }
}
