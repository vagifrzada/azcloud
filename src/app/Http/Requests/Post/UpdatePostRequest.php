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
            'title.*'   => 'required|string|distinct|min:3',
            'slug'      => 'required|array|min:3',
            'slug.*'    => 'required|string|distinct|min:3',
            'content'   => 'required|array|min:3',
            'content.*' => 'required|string|distinct|min:3',
            'image'     => 'image',
            'images.*'  => 'image',
            'tags'      => 'array',
            'tags.*'    => 'string|distinct|min:3',
            'status'    => 'required|boolean',
        ];
    }
}
