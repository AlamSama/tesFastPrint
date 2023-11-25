<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use App\Models\status;
use Illuminate\Http\Request;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $status = $request->input('filter');

        if ($status) {
            $filteredData = produk::where('status_id', $status)->with(['kategori', 'status'])->get();
        } else {
            $filteredData = produk::with(['kategori', 'status'])->get();
        }

        $data = ['judul' => 'Produk', 'produks' => $filteredData, 'status' => status::all()];
        return view('produks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produks.create', ['kategoris' => kategori::all(), 'statues' => status::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_produk' => 'required',
                'harga' => 'required',
                'kategori_id' => 'required',
                'status_id' => 'required',
            ],
            [
                'nama_produk.required' => 'nama produk tidak boleh kosong',
                'harga.required' => 'harga produk tidak boleh kosong',
                'kategori_id.required' => 'kategori produk tidak boleh kosong',
                'status_id.required' => 'status produk tidak boleh kosong',
            ]
        );

        $produk = produk::create($validated);
        if ($produk) {
            return redirect()->route('produk')->with('success', 'Anda Berhasil Menambah produk');
        } else {
            return back()->with('error', 'Anda Gagal Menambah produk');
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
        $produk = produk::where('id', $id)->first();
        return view('produks.edit', ['produk' => $produk, 'kategoris' => kategori::all(), 'statues' => status::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'nama_produk' => 'required',
                'harga' => 'required',
                'kategori_id' => 'required',
                'status_id' => 'required',
            ],
            [
                'nama_produk.required' => 'nama produk tidak boleh kosong',
                'harga.required' => 'harga produk tidak boleh kosong',
                'kategori_id.required' => 'kategori produk tidak boleh kosong',
                'status_id.required' => 'status produk tidak boleh kosong',
            ]
        );

        $produk = produk::where('id', $id)->update($validated);
        if ($produk) {
            return redirect()->route('produk')->with('success', 'Anda Berhasil Mengubah produk');
        } else {
            return back()->with('error', 'Anda Gagal Mengubah produk');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = produk::withTrashed()->findOrFail($id);

        if ($produk->trashed()) {
            $produk->forceDelete();
            return redirect()->route('arsipProduk')->with('success', 'Anda Berhasil Menghapus Sementara Data produk');
        } else {
            $produk->delete();
            return redirect()->route('produk')->with('success', 'Anda Berhasil Menghapus Sementara Data produk');
        }
    }

    public function arsip()
    {
        $produks = produk::onlyTrashed()->with(['kategori', 'status'])->get();
        return view('produks.arsip', ['produks' => $produks]);
    }

    public function restore($id)
    {
        $restore = produk::withTrashed()->findOrFail($id);

        if ($restore) {
            $restore->restore();
            return redirect()->back()->with('success', 'Anda Berhasil mengembalikan Data Produk dari arsip');
        } else {
            return redirect()->back()->with('error', 'Anda Gagal mengembalikan Data Produk dari arsip');
        }
    }
}
