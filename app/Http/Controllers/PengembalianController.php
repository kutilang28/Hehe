<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Fetch all Peminjaman records associated with the authenticated user
    $userId = auth()->user()->id;

    // Fetch koleksi records associated with the user and sort by borrowing date in descending order
    $peminjamans = Peminjaman::where('user_id', $userId)
        ->with('buku')
        ->orderByDesc('created_at')
        ->get();

    // Initialize an empty array to store books
    $books = [];

    // Loop through each Peminjaman record
    foreach ($peminjamans as $peminjaman) {
        // Retrieve the book associated with the Peminjaman record
        $book = $peminjaman->buku;

        // Add the book to the books array if it's not null
        if ($book) {
            $books[] = $book;
        }
    }

    foreach ($peminjamans as $peminjaman) {
        // Check if tanggal_pengembalian is today
        if (Carbon::parse($peminjaman->tanggal_pengembalian)->isToday()) {
            // Update status to "Dikembalikan"
            $peminjaman->status = 'Dikembalikan';
            $peminjaman->save();
        }
    }

    // Pass the data to the view
    return view('pinjam.pengembalian', compact('books', 'peminjamans'));
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
    // Find the Peminjaman record by its ID
    $borrowing = Peminjaman::findOrFail($request->input('return_id'));

    // Update the tanggal_pengembalian and status fields
    $borrowing->tanggal_pengembalian = Carbon::now();
    $borrowing->status = 'Dikembalikan';
    $borrowing->save();

    // Get the associated book and update its status
    $book = Buku::findOrFail($borrowing->buku_id);
    $book->status = 1; // Assuming "1" represents the returned status
    $book->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Book returned successfully.');
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
