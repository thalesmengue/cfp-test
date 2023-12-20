<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Actions\Users\UserStoreAction;
use App\Actions\Auth\UserValidateAction;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\Auth\AuthLoginRequest;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function login(
        AuthLoginRequest $request,
        UserValidateAction $validateUserAction
    ): RedirectResponse
    {
        $credentials = $request->validated();

        if ($validateUserAction->execute($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('users.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function create(): View
    {
        return view('auth.register');
    }

    public function store(
        UserStoreRequest $request,
        UserStoreAction $userStoreAction
    ): RedirectResponse
    {
        $data = $request->validated();

        $userStoreAction->execute($data);

        return redirect()->route('auth.index')->with('success', 'User created successfully');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.index');
    }
}
