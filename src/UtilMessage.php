<?php

namespace Phablo\Helpers;


class UtilMessage
{
    public static function initialPath()
    {
        return 'messages.'.config('app.locale');
    }

    public static function print($path)
    {
        return config(self::initialPath().'.'.$path) ?? 'Menssagem desconhecida';
    }

    public static function printException($path) 
    {
        return config(self::initialPath().'.exceptions.'.$path) ?? 'Exceção desonhecida';
    }

    public static function toSuccessJson($data, $status = 200)
    {
        return response()->json([
            'data'  => $data,
            'error' => NULL
        ], $status);
    }

    public static function toErrorJson($error, $status = 500)
    {
        return response()->json([
            'data'  => NULL,
            'error' => $error
        ], $status);
    }

    public static function toInternalServerErrorException()
    {
        return response()->json([
            'data' => NULL,
            'error' => self::printException('generic')
        ], 500);
    }

    public function toRequestValidateErrors($errors)
    {   
        if (count($errors)) {
            return response()->json([
                'data' => NULL,
                'error' => []
            ], 409);
        }
    }
}
