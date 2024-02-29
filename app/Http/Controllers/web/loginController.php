<?php

namespace App\Http\Controllers\web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showLoginForm(Request $request)
    {
        @$sessionToken = $request->session()->get('token');
        @$sessionroles = $request->session()->get('roles');
        // dd($sessionroles);
        @$personalAccessToken = PersonalAccessToken::findToken($sessionToken);

        if (!isset($personalAccessToken)) {
            return view('pages.auth.login');
        } else {
            if ($sessionroles === 1) {
                return redirect()->route('dashboard');
            } elseif ($sessionroles === 2) {
                return redirect()->route('beranda');
            }
        }
    }

    public function login(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->post(url('http://127.0.0.1:8000/api/login'), [
                'json' => [
                    'email' => $request->email,
                    'password' => $request->password,
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            // dd($data);
            session([
                'token' => $data['token'],
                'roles' => $data['roles'],
                'idUser' => $data['iUser'],
            ]);

            if ($data['roles'] === 1) {
                return redirect()->route('dashb');
            } elseif ($data['roles'] === 2) {
                return redirect()->route('beranda');
            } else {
                // Redirect to a default route if no specific role-based route is defined
                return redirect()->route('login');
            }



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

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'You have been logged out.');
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
