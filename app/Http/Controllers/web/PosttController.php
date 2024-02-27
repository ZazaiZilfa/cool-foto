<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PosttController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $urls = [
            "http://127.0.0.1:8000/api/shop",
            "http://127.0.0.1:8000/api/kategori"
        ];

        $combinedData = [];

        foreach ($urls as $index => $url) {
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            // Assign data to respective variables based on index
            if ($index === 0) {
                $data1 = $contentArray['data'];
            } else {
                $data2 = $contentArray['data'];
            }
        }

        // Pass data to the view as separate variables
        return view('pages.user.shop', ['data1' => $data1, 'data2' => $data2]);
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
    public function showkategori(string $id)
    {
        $client = new Client();
        $urls = [
            "http://127.0.0.1:8000/api/shop/kat/$id",
            "http://127.0.0.1:8000/api/kategori"
        ];

        $combinedData = [];

        foreach ($urls as $index => $url) {
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            // Assign data to respective variables based on index
            if ($index === 0) {
                $data1 = $contentArray['data'];
            } else {
                $data2 = $contentArray['data'];
            }
        }

        // Pass data to the view as separate variables
        return view('pages.user.shop', ['data1' => $data1, 'data2' => $data2]);
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
