<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Post = Wishlist::all(); // Assuming you're fetching a specific Post, change the parameter as needed
        // return response()->json(['post-data' => $Post]);
        return WishlistResource::collection($Post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wishlist = Wishlist::create($request->all());
        return new WishlistResource($wishlist);
    }

    /**
     * Display the specified resource.
     */
    public function show(wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return new WishlistResource($wishlist);
    }
}
