<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'content'   => 'required|array|min:3',
            'content.*' => 'required|string|min:3',
            'image'     => 'required|image',
            'images.*'  => 'image',
            'status'    => 'required|boolean',
        ];
    }
}
