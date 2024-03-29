<?php

namespace App\Http\Requests\User;

use App\DataTransferObjects\User\UserUpdateData;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['sometimes', 'string', 'max:255', 'min:3'],
            'last_name' => ['sometimes', 'string', 'max:255', 'min:3'],
            'email' => ['sometimes', 'email', 'unique:users,email,' . $this->user->id],
            'password' => ['nullable', 'sometimes', 'string', 'min:8'],
            'mobile' => ['sometimes', 'string', 'max:15', 'min:9'],
            'username' => ['sometimes', 'string', 'max:32', 'min:3', 'unique:users,username,' . $this->user->id],
        ];
    }

    public function toDTO(): UserUpdateData
    {
        return new UserUpdateData(
            firstName: $this->input('first_name'),
            lastName: $this->input('last_name'),
            email: $this->input('email'),
            username: $this->input('username'),
            mobile: $this->input('mobile'),
            password: $this->input('password') ?? $this->user->password,
        );
    }
}
