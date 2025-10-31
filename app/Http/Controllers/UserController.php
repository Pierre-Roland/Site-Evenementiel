<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function login(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = $this->userService->authenticate($validated['name'], $validated['password']);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Identifiants incorrects']);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return response()->json(['success' => true, 'user' => $user]);
    }


    public function signup(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = $this->userService->register($validated);

        Auth::login($user);
        $request->session()->regenerate();

        return response()->json(['success' => true, 'user' => $user]);
    }
}
