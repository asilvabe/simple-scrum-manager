<?php

namespace App\Http\Controllers\Api;

use App\DTOs\DeveloperTeam\DestroyDTO;
use App\DTOs\DeveloperTeam\IndexDTO;
use App\DTOs\DeveloperTeam\StoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeveloperTeam\IndexRequest;
use App\Http\Requests\DeveloperTeam\StoreRequest;
use App\Models\DeveloperTeam;
use Illuminate\Http\JsonResponse;

class DeveloperTeamController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        $developers = DeveloperTeam::ofTeam($request->input('team'))->with('developer')->get();

        return response()->api()->index(new IndexDTO($developers));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        DeveloperTeam::create([
            'developer_id' => $request->input('developer'),
            'team_id' => $request->input('team')
        ]);

        return response()->api()->created(new StoreDTO(trans('teams.messages.developer_attached')));
    }

    public function destroy(DeveloperTeam $developerTeam): JsonResponse
    {
        $developerTeam->delete();

        return response()->api()->deleted(new DestroyDTO(trans('teams.messages.developer_detached')));
    }
}
