<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPenerbit = Penerbit::all(); // melakukan query untuk mendapatkan semua data penerbit
        return view('penerbit.index', compact('allPenerbit')); //compact untuk mengirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.create'); //untuk menampilkan formulir data buku
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //memproses saat kita submit datanya
        //buat validasi
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100'
        ]);

        //simpan data ke database
        Penerbit::create($validatedData);

        //redirect ke halaman index
        return redirect()->route('penerbit.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        //untuk menampilkan detail data penerbit
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerbit $penerbit)
    {
        //menampilkan formulir edit data penerbit 
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        //mengupdet saat kita submit datanya
        //buat validasi
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100'
        ]);

        //update data ke database
        $penerbit->update($validatedData);

        //redirect ke halaman index
        return redirect()->route('penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbit $penerbit)
    {
        //menghapus data penerbit
        $penerbit->delete();

        //redirect ke halaman index
        return redirect()->route('penerbit.index');
    }
}