<?php

namespace App\ViewModels\Team;

use App\Models\Team;
use App\Models\User;
use App\ViewModels\ViewModel;

class EditViewModel extends ViewModel
{
    public function __construct(Team $team)
    {
        parent::__construct($team);
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'team' => $this->model,
            'scrumMasters' => User::all(['id', 'name']),
        ]);
    }

    protected function buttons(): array
    {
        return [
            'back' => [
                'route' => route('teams.show', $this->model),
            ],
            'index' => [
                'route' => route('teams.index'),
                'text' => trans('Teams')
            ],
            'destroy' => [
                'route' => route('teams.destroy', $this->model),
            ]
        ];
    }

    protected function title(): string
    {
        return trans('Edit team: :name', ['name' => $this->model->name]);
    }
}
