<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShopResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Post = Post::all(); // Assuming you're fetching a specific Post, change the parameter as needed
        // return response()->json(['post-data' => $Post]);
        return ShopResource::collection($Post);
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
    public function show(Post $Post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $Post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $Post)
    {
        //
    }

    //my own function
    private function generatePosCode()
    {
        $lastPosCode = Post::orderBy('id', 'desc')->value('kodeKategori');
        if ($lastPosCode) {
            $lastNumber = intval(substr($lastPosCode, 3)); // Extracting the number part
            $nextNumber = $lastNumber + 1;
            $nextPosCode = 'KAT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT); // Padding with leading zeros
        } else {
            $nextPosCode = 'KAT001'; // If no existing codes, start with POS001
        }

        return $nextPosCode;
    }
}
