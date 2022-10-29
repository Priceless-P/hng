<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HttpResponse
{
    protected function success(object $data, $message = null, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Request successful',
            'message'=>$message,
            'data' => $data
        ], $code);
    }

    protected function error($data, $message = null, $code): JsonResponse
    {
        return response()->json([
            'status' => 'An error occured',
            'message'=>$message,
            'data' => $data
        ], $code);
    }
}
