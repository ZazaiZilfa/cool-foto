<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShopResource;
use Illuminate\Support\Facades\Storage;
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
        // return pathinfo($request->postImage, PATHINFO_EXTENSION);
        $validated = $request->validate([
            'postTitle' => 'required|max: 255',
            'postCategory' => 'required',
            'postImage' => 'required',
            'status' => 'required',
        ]);

        if ($request->postImage) {
            $fileName = $this->generateRandomString();
            $extension = "jpg";

            // $extension = $request->postImage->extension();

            $fn = $fileName . '.' . $extension;

            Storage::putFileAs('public/image', $request->postImage, $fn);
            // $imagePath = $request->file('postImage')->store('public/images');
        }
        // return $request->postImage;
        // $request['idPost'];
        $post = Post::create([
            'postTitle' => $request->postTitle,
            'postDesc' => $request->postDesc,
            'kodeUser' => $request->idUser,
            'postCategory' => $request->postCategory,
            'postImage' => $fn,
            'price' => $request->price,
            'approvalStatus' => '0',
            'status' => $request->status,
        ]);
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

    public function showkat($id)
    {
        $posts = Post::where('postCategory', $id)->get();
        return ShopResource::collection($posts);
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

    function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
