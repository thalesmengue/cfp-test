<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Actions\Users\UserStoreAction;
use App\Actions\Users\UserDeleteAction;
use App\Actions\Users\UserUpdateAction;
use App\Http\Resources\Api\UserResource;
use App\Actions\Users\UserFetchAllAction;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(UserFetchAllAction $action): UserResource
    {
        $data = $action->execute();

        return new UserResource($data);
    }

    public function store(UserStoreRequest $request, UserStoreAction $action): JsonResponse
    {
        $data = $request->toDTO();

        $response = $action->execute($data);

        return (new UserResource($response))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UserUpdateRequest $request, User $user, UserUpdateAction $action): JsonResponse
    {
        $data = $request->toDTO();

        $action->execute($data, $user);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function destroy(User $user, UserDeleteAction $action): JsonResponse
    {
        $action->execute($user);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
