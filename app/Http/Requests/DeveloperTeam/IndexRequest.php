<?php

namespace App\Http\Requests\DeveloperTeam;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'team' => ['required', 'numeric', Rule::exists('teams', 'id')]
        ];
    }
}
