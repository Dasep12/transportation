<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Helpers\AuthHelper;

class AuthModel extends Model
{
    use HasFactory;

    public static function check($req)
    {
        $username = $req->input('username');
        $password = $req->input('password');
        $pass = AuthHelper::encrpyPassword($password);
        $SQL = "SELECT * FROM users WHERE username='" . ($username) . "' and `status`='Active' ";

        $res = DB::select($SQL);
        return $res;
    }
}
