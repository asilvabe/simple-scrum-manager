<?php

namespace App\ViewModels\Developer;

use App\Enums\DeveloperLevels;
use App\Models\Developer;
use App\ViewModels\ViewModel;

class CreateViewModel extends ViewModel
{
    public function __construct()
    {
        parent::__construct(new Developer());
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'developer' => $this->model(),
            'levels' => DeveloperLevels::toArray(),
        ]);
    }

    protected function buttons(): array
    {
        return [
            'back' => [
                'route' => route('developers.index'),
            ],
        ];
    }

    protected function title(): string
    {
        return trans('developers.create');
    }
}
