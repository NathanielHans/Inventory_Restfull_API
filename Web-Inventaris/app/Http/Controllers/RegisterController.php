<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:8',
            'email' => 'required|email:dns|unique:users',  
            'telepon' => 'required|max:12|unique:users'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);


        $result = User::create($validatedData);
        if ($result) {
            return response()->json(['message' => 'Akun Berhasil Dibuat!']);
        } else {
            return response()->json(['message' => 'Akun Gagal Dibuat!']);
        }
        //return redirect('/login')->with('success', 'Registration Success! Please Login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
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
}
