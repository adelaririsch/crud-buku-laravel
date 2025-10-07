<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request; 

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allBuku = Buku::all(); // melakukan query untuk mendapatkan semua data buku
        return view('buku.index', compact('allBuku')); //compact untuk mengirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.create',compact('penerbit','kategori')); //untuk menampilkan formulir data buku
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //memproses saat kita submit datanya
        //buat validasi
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required'
        ]);

        //simpan data ke database
        Buku::create($validatedData);

        //redirect ke halaman index
        return redirect()->route('buku.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //untuk menampilkan detail data buku
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        //menampilkan formulir edit data buku 
        return view('buku.edit', compact('buku','penerbit','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //mengupdet saat kita submit datanya
        //buat validasi
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required'
    
        ]);

        //update data ke database
        $buku->update($validatedData);

        //redirect ke halaman index
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //menghapus data buku
        $buku->delete();

        //redirect ke halaman index
        return redirect()->route('buku.index');
    }
}