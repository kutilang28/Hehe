<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Koleksi;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Get the authenticated user's ID
        $userId = auth()->user()->id;

        // Fetch koleksi records associated with the user
        $items = Koleksi::where('user_id', $userId)->with('buku')->get();

        // Initialize an empty array to store books
        $books = [];

        // Loop through each koleksi record
        foreach ($items as $item) {
            // Extract the buku_id
            $bookId = $item->buku_id;
            // Fetch the corresponding book using the buku_id
            $book = Buku::find($bookId);
            // Add the book to the books array
            if ($book) {
                $books[] = $book;
            }
        }
        // dd($books);

        // Pass the books data to the view
        return view('pinjam.koleksi', compact('books'));
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
