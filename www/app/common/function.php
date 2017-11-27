<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 2017/9/11
 * Time: 下午4:09
 */

function deep_in_array($value, $array) {
    foreach($array as $item) {
        if(!is_array($item)) {
            if ($item == $value) {
                return true;
            } else {
                continue;
            }
        }

        if(in_array($value, $item)) {
            return true;
        } else if(deep_in_array($value, $item)) {
            return true;
        }
    }
    return false;
}
