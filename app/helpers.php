<?php

if (!function_exists('strLimitWithOrDefaultValue')){
    function strLimitWithCheckOrDefault($check, $string , $limit = 20, $default = 'N/A') {
        return isset($check) ? str($string)->limit($limit) : $default;
    }
}
