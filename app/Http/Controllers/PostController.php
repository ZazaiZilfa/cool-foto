<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShopResource;
use App\Http\Resources\ShopDetailResource;

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
        $validated = $request->validate([
            'postTitle' => 'required|max: 255',
            'postCategory' => 'required',
            'postImage' => 'required',
            'status' => 'required',
        ]);
        $request['idPost'];
        $post = Post::create($request->all());
        return new ShopResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with('kat:idKategori,namaKategori')
            ->with('writer:idUser,name,email')
            ->find($id);
        return new ShopDetailResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'postTitle' => 'required|max: 255',
            'postCategory' => 'required',
            'postImage' => 'required',
            'status' => 'required',
        ]);

        $post = Post::findorFail($id);
        // dd($kategori);
        $post->update($request->all());

        return new ShopResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findorFail($id);
        // dd($kategori);
        $post->delete();
        return new ShopResource($post);
    }

    //my own function

}
