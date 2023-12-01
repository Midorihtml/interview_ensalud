<?php

namespace Src\lib;

class Response{

    public static function success(array $data) : array{
        $result = [
            'status'=>200,
        ];
        $result = array_merge($result, $data);
        return $result;
    }

    public static function error(string $msg): array{
        return [
            'status'=>500,
            'msg'=> $msg,
        ];
    }
}