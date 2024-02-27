<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all(); // Assuming you're fetching a specific shop, change the parameter as needed
        // return response()->json(['post-data' => $shop]);
        return KategoriResource::collection($kategori);
    }

    private function generatePosCode()
    {
        $lastPosCode = Kategori::orderBy('id', 'desc')->value('kodeKategori');
        if ($lastPosCode) {
            $lastNumber = intval(substr($lastPosCode, 3)); // Extracting the number part
            $nextNumber = $lastNumber + 1;
            $nextPosCode = 'KAT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT); // Padding with leading zeros
        } else {
            $nextPosCode = 'KAT001'; // If no existing codes, start with POS001
        }

        return $nextPosCode;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaKategori' => 'required|max: 255',
        ]);
        $request['id'];
        $kategori = Kategori::create($request->all());
        return new KategoriResource($kategori);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Kategori::find($id);
        return new KategoriResource($post);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'namaKategori' => 'required|max: 255',
        ]);

        $kategori = Kategori::findOrFail($id);
        // dd($kategori->namaKategori);
        $kategori->namaKategori = $request->namaKategori; // Map request field to model field
        // dd($kategori->namaKategori);
        $kategori->update();
        return new KategoriResource($kategori);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findorFail($id);
        // dd($kategori);
        $kategori->delete();
        return new KategoriResource($kategori);
    }
}
