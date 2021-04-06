<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\ViewModels\TeamViewModel;
use Illuminate\Contracts\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        $title = trans('Teams');
        $teams = Team::paginate();
        return view('teams.index', compact('teams', 'title'));
    }

    public function show(Team $team, TeamViewModel $viewModel): View
    {
        $team->load(['scrumMaster', 'developers']);
        $viewModel->setTeam($team);
        return view('teams.show', $viewModel->toArray());
    }
}
