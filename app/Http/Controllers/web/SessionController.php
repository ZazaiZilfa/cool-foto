<?php

namespace App\Http\Controllers\web;

use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function me(Request $request)
    {
        $client = new Client();
        $sessionToken = $request->session()->get('token');
        $sessionroles = $request->session()->get('roles');
        // dd($sessionroles);
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
        if (!empty($userId)) {
            $url = "http://127.0.0.1:8000/api/me";
            $respone = $client->request('GET', $url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $sessionToken
                ],
            ]);
            $content = $respone->getBody()->getContents();
            $contentarray = json_decode($content, true);
            $data = $contentarray['data'];
            // dd($data);
            // $matchingUser = null;

            // foreach ($data as $user) {
            //     if ($user['sessionToken'] === $sessionToken) {
            //         $matchingUser = $user;
            //         break;
            //     }
            // }

            // if ($matchingUser) {
            //     // User found, you can access user properties
            //     echo "User ID: " . $matchingUser['idUser'] . "\n";
            //     echo "User Name: " . $matchingUser['name'] . "\n";
            //     // Access other user properties as needed
            // } else {
            //     // No user found with the given session token
            //     echo "No user found for the session token provided.";
            // }



            return $data;
        } else {
            // Handle case where session token is empty
            // For example, redirect to login page or return an error response
            // echo "Session token is empty.";
            return redirect()->route('login');
        }


        // $user = Auth::user();
        // $post = Post::where('kodeUser', $user->idUser)->get();


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
