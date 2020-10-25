<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateUserRequest
 * @package App\Http\Requests
 */
class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return !auth()->guest();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'status' => 'integer',
        ];
    }
}
