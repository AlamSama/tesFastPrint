<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = kategori::all();
        $data = ['judul' => 'kategori', 'kategoris' => $kategoris];
        return view('kategori.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_kategori' => 'required',
            ],
            [
                'nama_kategori.required' => 'nama kategori tidak boleh kosong',
            ]
        );

        $create = kategori::create($validated);
        if ($create) {
            return redirect()->route('kategori')->with('success', 'Anda Berhasil Menambah Kategori');
        } else {
            return back()->with('error', 'Anda Gagal Menambah Kategori');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = kategori::where('id', $id)->first();
        return view('kategori.edit', ['kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'nama_kategori' => 'required',
            ],
            [
                'nama_kategori.required' => 'nama kategori tidak boleh kosong',
            ]
        );

        $update = kategori::where('id', $id)->update($validated);
        if ($update) {
            return redirect()->route('kategori')->with('success', 'Anda Berhasil Mengubah Kategori');
        } else {
            return back()->with('error', 'Anda Gagal Mengubah Kategori');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = kategori::withTrashed()->findOrFail($id);

        if ($kategori->trashed()) {
            $kategori->forceDelete();
            return redirect()->route('arsipKategori')->with('success', 'Anda Berhasil Menghapus Sementara Data Kategori');
        } else {
            $kategori->delete();
            return redirect()->route('kategori')->with('success', 'Anda Berhasil Menghapus Sementara Data Kategori');
        }
    }

    public function arsip()
    {
        $kategoris = kategori::onlyTrashed()->get();
        return view('kategori.arsip', ['kategoris' => $kategoris]);
    }

    public function restore($id)
    {
        $restore = kategori::withTrashed()->findOrFail($id);

        if ($restore) {
            $restore->restore();
            return redirect()->back()->with('success', 'Anda Berhasil mengembalikan Data Kategori dari arsip');
        } else {
            return redirect()->back()->with('error', 'Anda Gagal mengembalikan Data Kategori dari arsip');
        }
    }
}
