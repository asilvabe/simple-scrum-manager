<?php

namespace App\Http\Requests\DeveloperTeam;

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
            'developer' => [
                'required',
                'numeric',
                Rule::exists('developers', 'id'),
                Rule::unique('developer_team', 'developer_id')->where(function ($query) {
                    return $query->where('team_id', $this->input('team'));
                }),
            ],
            'team' => [
                'required',
                'numeric',
                Rule::exists('teams', 'id')
            ]
        ];
    }
}
