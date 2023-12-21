<?php

namespace App\Http\Controllers;

use App\Actions\Users\UserUpdateAction;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Actions\Users\UserStoreAction;
use App\Actions\Users\UserDeleteAction;
use App\Actions\Users\UserFetchAllAction;
use App\Http\Requests\User\UserStoreRequest;

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

    public function store(UserStoreRequest $request, UserStoreAction $action): RedirectResponse
    {
        $data = $request->validated();

        $action->execute($data);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(UserUpdateRequest $request, User $user, UserUpdateAction $action): RedirectResponse
    {
        $data = $request->validated();

        $action->execute($data, $user);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy(User $user, UserDeleteAction $action): RedirectResponse
    {
        $action->execute($user);

        return back()
            ->with('success', 'User deleted successfully');
    }
}
