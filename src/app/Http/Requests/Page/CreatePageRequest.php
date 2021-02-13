<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class CreatePageRequest extends FormRequest
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
            'identity'  => 'required|string|min:3',
            'status'    => 'required|boolean',
        ];
    }
}
