<?php

namespace App\ViewModels\Team;

use App\Models\Team;
use App\Models\User;
use App\ViewModels\ViewModel;

class CreateViewModel extends ViewModel
{
    public function __construct()
    {
        parent::__construct(new Team());
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'team' => $this->model,
            'scrumMasters' => User::all(['id', 'name']),
        ]);
    }

    protected function title(): string
    {
        return trans('Create a new team');
    }
}
