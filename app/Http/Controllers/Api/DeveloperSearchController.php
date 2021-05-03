<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeveloperSearchController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $developers = Developer::select(['id', 'name', 'email'])->search($request->get('query'));

        return response()->json(['data' => $developers->take(3)->get()]);
    }
}
