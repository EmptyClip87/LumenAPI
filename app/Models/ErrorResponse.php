<?php

namespace App\Models;


class ErrorResponse
{
    public static function make(string $message, int $statusCode) {
        return [
            'code' => $statusCode,
            'message' => $message
        ];
    }
}