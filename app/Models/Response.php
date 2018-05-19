<?php

namespace App\Models;


class Response
{
    public static function make($data, $code = 200) {
        return [
            'code' => $code,
            'message' => 'OK',
            'data' => $data
        ];
    }
}