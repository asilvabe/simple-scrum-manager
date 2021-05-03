<?php

namespace App\ViewModels\Developer;

use App\Models\Developer;
use App\ViewModels\ViewModel;

class IndexViewModel extends ViewModel
{
    public function __construct()
    {
        parent::__construct(new Developer());
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'developers' => $this->model()->orderBy('name')->paginate(),
        ]);
    }

    protected function buttons(): array
    {
        return [
            'create' => [
                'route' => route('developers.create'),
                'text' => trans('developers.create')
            ],
        ];
    }

    protected function title(): string
    {
        return trans('developers.title');
    }
}
