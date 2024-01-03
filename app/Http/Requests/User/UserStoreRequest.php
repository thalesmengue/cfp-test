<?php

namespace App\Http\Requests\User;

use App\DataTransferObjects\User\UserStoreData;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255', 'min:3'],
            'last_name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'mobile' => ['required', 'string', 'max:15', 'min:9'],
            'username' => ['required', 'string', 'max:32', 'min:3', 'unique:users,username'],
        ];
    }

    public function toDTO(): UserStoreData
    {
        return new UserStoreData(
            firstName: $this->input('first_name'),
            lastName: $this->input('last_name'),
            email: $this->input('email'),
            username: $this->input('username'),
            mobile: $this->input('mobile'),
            password: $this->input('password'),
        );
    }
}
