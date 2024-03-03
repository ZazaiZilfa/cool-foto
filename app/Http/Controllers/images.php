<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class images extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $imageDirectory = storage_path('app/public/image');
        $images = [];

        // Get all files in the directory
        $files = scandir($imageDirectory);

        // Filter out directories and hidden files
        $files = array_filter($files, function ($file) {
            return !in_array($file, ['.', '..', '.gitignore']);
        });

        // Read each image file and encode it as base64
        foreach ($files as $file) {
            $filePath = $imageDirectory . '/' . $file;
            $fileContent = file_get_contents($filePath);
            $base64Image = base64_encode($fileContent);
            $images[] = [
                'name' => $file,
                'data' => $base64Image
            ];
        }

        return response()->json($images);
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
