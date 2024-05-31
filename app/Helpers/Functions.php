<?php

function ApiResponse($success = true, $data = null, $statusCode = 200, $message)
{
    if ($success) {
        return response()->json([
            'success' => $success,
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
    return response()->json([
        'success' => $success,
        'statusCode' => $statusCode,
        'message' => $message,
    ], $statusCode);
}
