<?php

namespace App\ViewModels\Developer;

use App\Enums\DeveloperLevels;
use App\Models\Developer;
use App\ViewModels\ViewModel;

class EditViewModel extends ViewModel
{
    public function __construct(Developer $developer)
    {
        parent::__construct($developer);
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'developer' => $this->model,
            'levels' => DeveloperLevels::toArray(),
        ]);
    }

    protected function buttons(): array
    {
        return [
            'back' => [
                'route' => route('developers.show', $this->model),
            ],
            'index' => [
                'route' => route('developers.index'),
                'text' => trans('developers.title')
            ],
            'destroy' => [
                'route' => route('developers.destroy', $this->model),
            ]
        ];
    }

    protected function title(): string
    {
        return trans('developers.edit', ['developer' => $this->model->name]);
    }
}
