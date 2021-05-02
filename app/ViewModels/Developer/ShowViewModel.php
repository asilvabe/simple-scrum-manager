<?php

namespace App\ViewModels\Developer;

use App\ViewModels\ViewModel;

class ShowViewModel extends ViewModel
{

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'title' => $this->title(),
            'developer' => $this->model(),
        ]);
    }

    protected function buttons(): array
    {
        return [
            'back' => [
                'route' => route('developers.index'),
            ],
            'edit' => [
                'route' => route('developers.edit', $this->model()),
            ],
            'destroy' => [
                'route' => route('developers.destroy', $this->model()),
            ],
        ];
    }

    protected function title(): string
    {
        return $this->model()->name;
    }
}
