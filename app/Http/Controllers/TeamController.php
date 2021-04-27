<?php

namespace App\Http\Controllers;

use App\Actions\Teams\StoreOrUpdateTeam;
use App\Http\Requests\Teams\StoreRequest;
use App\Http\Requests\Teams\UpdateRequest;
use App\Models\Team;
use App\ViewModels\Team\CreateViewModel;
use App\ViewModels\Team\EditViewModel;
use App\ViewModels\Team\IndexViewModel;
use App\ViewModels\Team\ShowViewModel;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TeamController extends Controller
{
    public function index(): View
    {
        $viewModel = new IndexViewModel();
        return view('teams.index', $viewModel->toArray());
    }

    public function show(Team $team): View
    {
        $team->load(['scrumMaster'])->loadCount('developers');
        $viewModel= new ShowViewModel($team);
        return view('teams.show', $viewModel->toArray());
    }

    public function create(): View
    {
        return view('teams.create', (new CreateViewModel())->toArray());
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $team = StoreOrUpdateTeam::execute($request->validated());
        return redirect()->route('teams.show', $team)->withSuccess(trans('Team created!'));
    }

    public function edit(Team $team): View
    {
        $viewModel = new EditViewModel($team);
        return view('teams.edit', $viewModel->toArray());
    }

    public function update(Team $team, UpdateRequest $request): RedirectResponse
    {
        $team = StoreOrUpdateTeam::execute($request->validated(), $team);
        return redirect()->route('teams.show', $team)->withSuccess(trans('Team updated!'));
    }

    public function destroy(Team $team): RedirectResponse
    {
        try {
            $team->delete();
        } catch (Exception $e) {
            return redirect()->route('teams.show', $team)->withError(trans('Cant delete this team!'));
        }

        return redirect()->route('teams.index')->withSuccess(trans('Team deleted!'));
    }
}
