<?php

namespace App\Http\Controllers\web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7;
use Laravel\Sanctum\PersonalAccessToken;

class UploadimageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        @$sessionid = $request->session()->get('idUser');
        @$sessionToken = $request->session()->get('token');
        @$sessionroles = $request->session()->get('roles');
        // dd($sessionroles);
        @$personalAccessToken = PersonalAccessToken::findToken($sessionToken);

        if (!isset($personalAccessToken)) {
            return view('pages.auth.login');
        }

        return view('pages.user.simpleform', ['sessionid' => $sessionid]);
        // return view('pages.user.simpleform');
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
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/uploadpost';
        // $file = $request->file(postImage);
        // dd($request->postImage);
        // if ($file) {
        // $imageContents = Psr7\Utils::tryFopen($file->getRealPath(), 'r');
        try {
            // $respone = $client->request('POST', $url, [
            //     'headers' => ['Accept' => 'application/json'],
            //     'multipart' => [
            //         [
            //             'name' => 'namaKategori',
            //             'contents' => $namakat
            //         ],
            //     ]
            // ]);

            $response = $client->request('POST', $url, [
                'headers' => ['Accept' => 'application/json'],
                'multipart' => [
                    [
                        'name' => 'idUser',
                        'contents' => $request->idUser
                    ],
                    [
                        'name' => 'postImage',
                        'contents' => $request->postImage,
                        // 'filename' => $file->getClientOriginalName() // Set filename if needed
                    ],
                    [
                        'name' => 'postTitle',
                        'contents' => $request->postTitle
                    ],
                    [
                        'name' => 'postDesc',
                        'contents' => $request->postDesc
                    ],
                    [
                        'name' => 'price',
                        'contents' => strval($request->price), // Convert integer to string
                    ],
                    [
                        'name' => 'postCategory',
                        'contents' => $request->postCategory
                    ],
                    [
                        'name' => 'status',
                        'contents' => $request->status
                    ],

                    // 'idUser' => $request->idUser,
                    // 'postImage' => $request->postImage,
                    // 'postTitle' => $request->postTitle,
                    // 'postDesc' => $request->postDesc,
                    // 'price' => $request->price,
                    // 'postCategory' => $request->postCategory,
                ]
            ]);

            // Get the response body content
            $responseBody = $response->getBody()->getContents();
            dd($responseBody);
            // Output the response body content to see the data
            // return $responseBody;

            // dd($request->postImage);
            // if ($response->successful()) {
            return redirect()->route('galery');
            // }
            // dd($data);
            // Here you can handle the response, such as saving token to session
            // For example:
            // session(['token' => $data['token']]);

            // return redirect()->route('datasession'); // Redirect to dashboard after successful login
        } catch (\Exception $e) {
            // Handle errors, for example, showing error message to user
            dd($e->getMessage());
        }
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
