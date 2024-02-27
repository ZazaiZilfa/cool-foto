<?php

namespace App\Http\Controllers\web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->post(url('http://127.0.0.1:8000/api/register'), [
                'json' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                ]
            ]);
            // if ($response->successful()) {
            return redirect()->route('login');
            // }
            // dd($data);
            // Here you can handle the response, such as saving token to session
            // For example:
            // session(['token' => $data['token']]);

            // return redirect()->route('datasession'); // Redirect to dashboard after successful login
        } catch (\Exception $e) {
            // Handle errors, for example, showing error message to user
            return back()->withInput()->withErrors(['message' => 'Invalid credentials.']);
        }
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
