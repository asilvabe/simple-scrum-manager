<?php

namespace App\Http\Requests\Developers;

use App\Enums\DeveloperLevels;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:150'],
            'email' => [
                'required',
                'max:120',
                'email:rfc',
                'unique:developers,email'
            ],
            'level' => ['required', Rule::in(DeveloperLevels::toArray())]
        ];
    }
}
