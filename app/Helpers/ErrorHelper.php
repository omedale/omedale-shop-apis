<?php
namespace App\Helpers;
class ErrorHelper {
    public static function  USR_04() {
        return response()->json([
            'error' => [
                'status' => 400,
                'code' => "USR_04",
                'message' => "The email already exists.",
                'field'=> "email"
            ]
        ])
        ->setStatusCode(400);
    }
    public static function USR_02($errors) {
        return response()->json([
            'error' => [
                'status' => 500,
                'code' => "USR_02",
                'message' => "The field(s) are/is required.",
                'field_errors'=> $errors
            ]
        ])
        ->setStatusCode(500);
    }

    public static function NOT_FOUND($model) {
        return response()->json([
            'error' => [
                'status' => 404,
                'code' => "NOT_FOUND",
                'message' => $model." not found",
            ]
        ])
        ->setStatusCode(404);
    }

    public static function AUT_03() {
        return response()->json([
            'error' => [
                'status' => 401,
                'code' => "AUT_03",
                'message' => "The apikey has expired",
            ]
        ])
        ->setStatusCode(401);
    }


    public static function AUT_02() {
        return response()->json([
            'error' => [
                'status' => 401,
                'code' => "AUT_02",
                'message' => "The apikey is invalid",
            ]
        ])
        ->setStatusCode(401);
    }

    public static function AUT_01() {
        return response()->json([
            'error' => [
                'status' => 401,
                'code' => "AUT_01",
                'message' => "Authorization code is empty",
            ]
        ])
        ->setStatusCode(401);
    }
     public static function USR_01() {
        return response()->json([
            'error' => [
                'status' => 400,
                'code' => "USR_01",
                'message' => " Email or Password is invalid",
            ]
        ])
        ->setStatusCode(400);
    }

}
