<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShopResource;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function show()
    {
        $Post = Post::count(); // Assuming you're fetching a specific Post, change the parameter as needed
        // return response()->json(['post-data' => $Post]);
        $user = User::count();
        $limapost = Post::latest()->limit(5)->get();
        $latestpost = ShopResource::collection($limapost);
        return ['data' => [
            'jumlahPost' => $Post,
            'jumlahUser' => $user,
            'postTerbaru' => $latestpost,
        ]];
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
