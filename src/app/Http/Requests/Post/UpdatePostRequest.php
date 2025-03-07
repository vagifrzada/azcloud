<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'     => 'required|array|min:3',
            'title.*'   => 'required|string|min:3',
            'slug'      => 'required|array|min:3',
            'slug.*'    => 'required|string|min:3',
            'image'     => 'image',
            'images.*'  => 'image',
            'status'    => 'required|boolean',
        ];
    }
}
