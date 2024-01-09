<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class AuthHelper
{
    public static function encrpyPassword($pass)
    {
        $password  = md5('adnan87' . $pass . 'tgm786');
        return $password;
    }

    public static function iss_session()
    {
        $id = session('isLogin');

        if ($id == null || $id == "") {
            return redirect("/logout")->with(["error" => 'Session ended']);
        }
    }

    public static function isUriFirs()
    {
        $uri = \Request::segment(1);
        return $uri;
    }

    public static function isUriSecond()
    {
        $uri = \Request::segment(1);
        $uri2 = \Request::segment(2);
        return $uri . '/' . $uri2;
    }
}
