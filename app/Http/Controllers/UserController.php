<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Actions\Users\UserDeleteAction;
use App\Actions\Users\UserFetchAllAction;

class UserController extends Controller
{
    public function index(UserFetchAllAction $action): View
    {
        $data = $action->execute();

        return view('users.index', [
            'users' => $data
        ]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy(User $user, UserDeleteAction $action): RedirectResponse
    {
        $action->execute($user);

        return back();
    }
}
