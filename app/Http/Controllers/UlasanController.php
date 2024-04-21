<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;


class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $userId = Auth::user();
        $Id = $userId->id;
        // dd($Id);
        $ulasan = new Ulasan;
        $ulasan->buku_id = $request->buku_id;
        $ulasan->ulasan = $request->ulasan;
        $ulasan->rating = $request->rating;
        $ulasan->user_id = $Id;
        $ulasan->save();
        return redirect()->back()->with('success', 'Review succesfully added.');
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
