<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\QuotesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuotesController extends Controller
{
    public function __construct(protected QuotesService $quotesService)
    {
    }

    public function index(): JsonResponse
    {
        try {
            $response = $this->quotesService->getQuotes();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                500
            ]);
        }

        return response()->json($response);
    }

    public function refresh(Request $request): JsonResponse
    {
        try {
            Log::info($request);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                500
            ]);
        }
    }
}
