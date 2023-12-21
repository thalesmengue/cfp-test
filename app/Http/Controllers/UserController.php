<?php

namespace App\Http\Controllers;

use App\Actions\Users\UserFetchAllAction;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
}
