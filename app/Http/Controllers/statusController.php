<?php

namespace App\Http\Controllers;

use App\Models\status;
use Illuminate\Http\Request;

class statusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['statuses' => status::all()];
        return view('status.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_status' => 'required',
            ],
            [
                'nama_status.required' => 'nama status tidak boleh kosong',
            ]
        );

        $create = status::create($validated);
        if ($create) {
            return redirect()->route('status')->with('success', 'Anda Berhasil Menambah status');
        } else {
            return back()->with('error', 'Anda Gagal Menambah status');
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
        $status = status::where('id', $id)->first();
        return view('status.edit', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'nama_status' => 'required',
            ],
            [
                'nama_status.required' => 'nama status tidak boleh kosong',
            ]
        );

        $update = status::findOrFail($id)->update($validated);
        if ($update) {
            return redirect()->route('status')->with('success', 'Anda Berhasil Mengubah status');
        } else {
            return back()->with('error', 'Anda Gagal Mengubah status');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = status::withTrashed()->findOrFail($id);

        if ($status->trashed()) {
            $status->forceDelete();
            return redirect()->route('arsipStatus')->with('success', 'Anda Berhasil Menghapus Sementara Data Status');
        } else {
            $status->delete();
            return redirect()->route('status')->with('success', 'Anda Berhasil Menghapus Sementara Data Status');
        }
    }

    public function arsip()
    {
        $status = status::onlyTrashed()->get();
        return view('status.arsip', ['status' => $status]);
    }

    public function restore($id)
    {
        $restore = status::withTrashed()->findOrFail($id);

        if ($restore) {
            $restore->restore();
            return redirect()->back()->with('success', 'Anda Berhasil mengembalikan Data Status dari arsip');
        } else {
            return redirect()->back()->with('error', 'Anda Gagal mengembalikan Data Status dari arsip');
        }
    }
}
