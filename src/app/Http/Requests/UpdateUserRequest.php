<?php

namespace App\Http\Requests;

use App\Entities\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return !auth()->guest();
    }

    public function rules(): array
    {
        $rules = [
            'name'   => 'required|string|max:100',
            'email'  => 'required|email',
            'status' => 'integer',
        ];

        // Find user and checking for uniqueness of email.
        $user = User::findOrFail((int) $this->segment(3));

        if ($this->request->get('email') !== $user->getEmail())
            $rules['email'] = 'required|email|unique:users';

        if (
            filled($this->request->get('password')) ||
            filled($this->request->get('password_confirmation'))
        ) {
            $rules['password'] = 'required|min:5|confirmed';
        }

        return $rules;
    }
}