<?php

namespace App\ViewModels\Team;

use App\Models\Team;
use App\ViewModels\ViewModel;

class IndexViewModel extends ViewModel
{
    public function __construct()
    {
        parent::__construct(new Team());
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'teams' => $this->model->paginate(),
        ]);
    }

    protected function buttons(): array
    {
        return [
            'create' => [
                'route' => route('teams.create'),
            ],
        ];
    }

    protected function title(): string
    {
        return trans('teams.title');
    }
}
