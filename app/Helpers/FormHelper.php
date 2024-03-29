<?php

namespace App\Helpers;

use Session;
use Illuminate\Http\RedirectResponse;

class FormHelper
{
    public static function formDropdown($name, $data, $selected, $attr='')
    {
        $selectHtml = '<select name="'.$name.'" '.$attr.'>';

        $optArray = array();
        foreach ($data as $key => $opt) {
            $selectedVal = ($key == $selected) ? 'selected="selected"' : "";
            $selectHtml .= '<option value="'.$key.'" '.$selectedVal.'>'.$opt.'</option>';
        }
        $selectHtml .= '</select>';

        return $selectHtml;
    }

    public static function convertRomawi($bulan)
    {
        switch ($bulan) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}