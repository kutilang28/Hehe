<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Buku;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Buku::all();
        return view('buku.index', compact('data'))->with([
            '' => Buku::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $item = new Buku;
        $item->judul = $request->judul;
        $item->penulis = $request->penulis;
        $item->penerbit = $request->penerbit;
        $item->tahun_terbit = $request->tahun_terbit;
        $item->kategori_id = $request->kategori;
        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('img'), $imageName);
        }
        $item->foto = $imageName;
        $item->save();
        return redirect()->route('buku.index')->with(['success' => 'Book has been added']);
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
        //
        return view('buku.edit')->with([
            'buku' => Buku::find($id),
            'kategori' => Kategori::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'foto' => 'required',
        ]);

        $item = Buku::findOrFail($id);
        $item->judul = $request->judul;
        $item->penulis = $request->penulis;
        $item->penerbit = $request->penerbit;
        $item->tahun_terbit = $request->tahun_terbit;
        $item->kategori = $request->kategori;
        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('img'), $imageName);
        }
        $item->foto = $imageName;
        $item->save();

        return redirect('buku')->with('success', 'Perubahan Data Barang Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Buku::findOrFail($id);
        $item->delete();
        return back()->with('success', 'Book has been deleted.');
    }
}
