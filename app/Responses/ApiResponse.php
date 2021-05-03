<?php

namespace App\Responses;

use App\DTOs\ApiDTO;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse
{
    public function index(ApiDTO $response): JsonResponse
    {
        return response()->json($response, Response::HTTP_OK);
    }
    public function created(ApiDTO $response): JsonResponse
    {
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function deleted(ApiDTO $response): JsonResponse
    {
        return response()->json($response, Response::HTTP_OK);
    }
}
