<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function authenticate(Request $request)
    {
        // return response()->json(['request'=>$request]);
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // return response()->json([$credentials]);
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            if (auth()->user()) {
                // Check if a user is authenticated before accessing 'role'
                if (auth()->user()->role == '0') {
                    $user = auth()->user();
                    $token = auth()->user()->createToken('personal-token')->plainTextToken;

                    return response()->json([
                        'message' => 'Login berhasil',
                        'user' => new UserResource($user),
                        'token' => $token,
                    ], 200);
                }
                $user = auth()->user();
                $token = auth()->user()->createToken('admin-token')->plainTextToken;
                return response()->json([
                    'message' => 'Login berhasil',
                    'user' => new UserResource($user),
                    'token' => $token,
                ], 200);
            } else {
                // Handle the case where there is no authenticated user
                return response()->json(['message' => 'No authenticated user'], 401);
            }
        }

        return response()->json(['message' => 'Login gagal'], 401);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout berhasil'], 200);
    }
}
