<?php

namespace App\Helpers;

class MenuHelper
{
    public static function isAccess()
    {
        if (Session('roles') == 'Supper Admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function isOperator()
    {
        if (Session('Operadores')) {
            return true;
        } else {
            return false;
        }
    }
}
