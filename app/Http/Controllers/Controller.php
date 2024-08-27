<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // Success response
    protected function successResponse($data, $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], $statusCode);
    }

    // Fails response
    protected function failsResponse($message, $error, $statusCode = 500)
    {
        return response()->json([
            'status' => 'fails',
            'message' => $message,
            'error' => $error,
        ], $statusCode);
    }
}
