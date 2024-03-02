<?php

namespace App\Http\Controllers\web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
        if (empty($userId)) {
            return redirect()->route('login');
        }
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/admin/dashboard/";
        $respone = $client->request('GET', $url);
        $content = $respone->getBody()->getContents();
        $contentarray = json_decode($content, true);
        $data = $contentarray['data'];
        return view('pages.dashboard', ['data' => $data]);
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
