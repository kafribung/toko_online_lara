<?php

namespace App\Http\Controllers\API;

class ResponsFormatter
{

    protected static $response = [
        'meta' => [
            'code'   => 200,
            'status' => 'succes',
            'msg'    => null,
        ],

        'data' => null
    ];

    public static function succes($data, $msg)
    {
        self::$response['meta']['msg'] = $msg;
        self::$response['data']        = $data;

        return response()->json(self::$response, self::$response['meta']['code']);

    }

    public static function error($msg)
    {
        self::$response['meta']['code']   = 400;
        self::$response['meta']['status'] = 'fail';
        self::$response['meta']['msg']    = $msg;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
