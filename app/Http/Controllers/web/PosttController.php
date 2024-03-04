<?php

namespace App\Http\Controllers\web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\PersonalAccessToken;

class PosttController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        @$sessionid = $request->session()->get('idUser');
        @$sessionToken = $request->session()->get('token');
        @$personalAccessToken = PersonalAccessToken::findToken($sessionToken);

        if ($personalAccessToken) {
            // Decode the token payload
            $payload = $personalAccessToken->tokenable;

            // $payload will contain the decoded token payload
            // $payload is typically an instance of the related model (e.g., User)

            // Example: Accessing user ID from the payload
            $userId = $payload->idUser;
            $userName = $payload->name;
            $userEmail = $payload->email;
            $userRoles = $payload->roles;
        }
        // dd($userRoles);
        if (empty($userId)) {
            return redirect()->route('login');
        }

        $client = new Client();
        $urls = [
            "http://127.0.0.1:8000/api/shop",
            "http://127.0.0.1:8000/api/kategori",
            "http://127.0.0.1:8000/api/wishlist"
        ];

        $combinedData = [];

        foreach ($urls as $index => $url) {
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            // Assign data to respective variables based on index
            if ($index === 0) {
                $data1 = $contentArray['data'];
            } elseif ($index === 1) {
                $data2 = $contentArray['data'];
            } elseif ($index === 2) {
                $data3 = $contentArray['data'];
            }

            // $photoPath = $data1['postImage'][0];

            // Generate URL for the photo
            // $photoUrl = Storage::url('image/' . $photoPath);
            foreach ($data1 as $post) {
                $photoPath = $post['postImage']; // Get the value of "postImage" key for the current post
                $photoUrl = Storage::url('image/' . $photoPath); // Generate URL for the phot

            }
            // dd($data1);
        }



        // Pass data to the view as separate variables
        return view('pages.user.shop', ['data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'sessionid' => $sessionid]);
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
    public function showkategori(Request $request, string $id)
    {

        @$sessionid = $request->session()->get('idUser');
        @$sessionToken = $request->session()->get('token');
        @$personalAccessToken = PersonalAccessToken::findToken($sessionToken);

        if ($personalAccessToken) {
            // Decode the token payload
            $payload = $personalAccessToken->tokenable;

            // $payload will contain the decoded token payload
            // $payload is typically an instance of the related model (e.g., User)

            // Example: Accessing user ID from the payload
            $userId = $payload->idUser;
            $userName = $payload->name;
            $userEmail = $payload->email;
            $userRoles = $payload->roles;
        }
        // dd($userRoles);
        if (empty($userId)) {
            return redirect()->route('login');
        }
        $client = new Client();
        $urls = [
            "http://127.0.0.1:8000/api/shop/kat/$id",
            "http://127.0.0.1:8000/api/kategori",
            "http://127.0.0.1:8000/api/wishlist"
        ];

        $combinedData = [];

        foreach ($urls as $index => $url) {
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            // Assign data to respective variables based on index
            if ($index === 0) {
                $data1 = $contentArray['data'];
            } elseif ($index === 1) {
                $data2 = $contentArray['data'];
            } elseif ($index === 2) {
                $data3 = $contentArray['data'];
            }
        }

        // Pass data to the view as separate variables
        return view('pages.user.shop', ['data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'sessionid' => $sessionid]);
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
