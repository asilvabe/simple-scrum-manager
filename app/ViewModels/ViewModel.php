<?php

namespace App\ViewModels;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

abstract class ViewModel implements Arrayable
{
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function toArray(): array
    {
        return [
            'buttons' => $this->buttons(),
            'texts' => $this->texts(),
        ];
    }

    abstract protected function buttons(): array;

    protected function texts(): array
    {
        return [
            'title' => $this->title(),
        ];
    }

    protected function model(): Model
    {
        return $this->model;
    }

    abstract protected function title(): string;
}
