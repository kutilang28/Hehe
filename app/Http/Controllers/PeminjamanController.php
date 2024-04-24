<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Ulasan;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Buku::all();
        $kategori = Kategori::all();
        return view('index', compact('data', 'kategori'))->with([
            '' => Buku::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $bookId = $request->input('book_id');
        $user = Auth::user();
        $book = Buku::findOrFail($request->input('book_id'));

        // dd($book);
        if ($book->status == 0) {
            return redirect()->back()->with('error', 'Book is not available for borrowing.');
        }



        Peminjaman::create([
            'user_id' => $user->id,
            'buku_id' => $bookId,
            'tanggal_peminjaman' => Carbon::now(),
            'tanggal_pengembalian' => Carbon::now()->addDays(7),
            'status' => 'dipinjam',
        ]);//membuat peminjaman sesuai user dah buku yang dipilih
        $existingKoleksi = Koleksi::where('user_id', $user->id)
                            ->where('buku_id', $bookId)
                            ->first();//memilih buku ke koleksi user

        if (!$existingKoleksi) {
            Koleksi::create([
                'user_id' => $user->id,
                'buku_id' => $bookId,
            ]);
        }//memasukkan buku ke koleksi user

        $book->status = '0';
        // dd($book);
        $book->update();

        return redirect()->back()->with('success', 'Book borrowed successfully, please return before 7 days');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $buku = Buku::all();
        $item = Buku::findOrFail($id);
        $ulasan = Ulasan::where('buku_id', $id)->with('buku')->get();
        //memilih buku
        return view('pinjam.pinjam', compact('item', 'buku', 'ulasan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
