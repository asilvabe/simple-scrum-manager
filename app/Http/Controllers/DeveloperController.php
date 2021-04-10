<?php

namespace App\Http\Controllers;


use App\Actions\Developers\StoreOrUpdateTeam;
use App\Http\Requests\Developers\StoreRequest;
use App\Http\Requests\Developers\UpdateRequest;
use App\Models\Developer;
use App\ViewModels\Developer\CreateViewModel;
use App\ViewModels\Developer\EditViewModel;
use App\ViewModels\Developer\IndexViewModel;
use App\ViewModels\Developer\ShowViewModel;

use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{

    public function index(): View
    {
        $viewModel = new IndexViewModel();
        return view('developers.index', $viewModel->toArray());
    }

    public function create(): View
    {
        return view('developers.create', (new CreateViewModel())->toArray());
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $team = StoreOrUpdateTeam::execute($request->validated());

        return redirect()->route('developers.show', $team)
            ->withSuccess(trans('developers.messages.created'));
    }

    public function show(Developer $developer): View
    {
        $viewModel= new ShowViewModel($developer);
        return view('developers.show', $viewModel->toArray());
    }

    public function edit(Developer $developer): View
    {
        $viewModel = new EditViewModel($developer);
        return view('developers.edit', $viewModel->toArray());
    }

    public function update(UpdateRequest $request, Developer $developer): RedirectResponse
    {
        $team = StoreOrUpdateTeam::execute($request->validated(), $developer);
        return redirect()->route('developers.show', $team)
            ->withSuccess(trans('developers.messages.updated'));
    }

    public function destroy(Developer $developer): RedirectResponse
    {
        try {
            $developer->delete();
        } catch (Exception $e) {
            return redirect()->route('developers.show', $developer)
                ->withError(trans('developers.messages.cannot_delete'));
        }

        return redirect()->route('developers.index')
            ->withSuccess(trans('developers.messages.deleted'));
    }
}
