<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
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
            'price'     => 'required',
            'image'     => 'required|image',
            'status'    => 'required|boolean',
        ];
    }
}
