<?php

namespace App\ViewModels\Team;

use App\ViewModels\ViewModel;

class ShowViewModel extends ViewModel
{

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'title' => $this->title(),
            'team' => $this->model,
            'scrumMaster' => $this->model->scrumMaster,
            'developers' => $this->model->developers,
            'sprints' => $this->model->sprints,
        ]);
    }

    protected function buttons(): array
    {
        return [
            'back' => [
                'route' => route('teams.index'),
            ],
            'edit' => [
                'route' => route('teams.edit', $this->model),
            ],
            'destroy' => [
                'route' => route('teams.destroy', $this->model),
            ],
        ];
    }

    protected function title(): string
    {
        return $this->model->name;
    }
}
