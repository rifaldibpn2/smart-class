<?php
namespace App\Helpers;

//buat ApiFormat
class ApiFormat
{
    protected static $response = [
        'status' => null,
        'message' => null,
        'data' => null
    ];

    public static function createResponse($status, $message, $data)
    {
        self::$response['status'] = $status;
        self::$response['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['status']);
    }
}


?>