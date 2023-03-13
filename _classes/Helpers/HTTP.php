<?php

namespace Helpers;

class HTTP
{
    static $base = "http://localhost/hello_php/login_pj";
    static function redirect($path, $q = "")
    {
        $url = static::$base . $path;
        if ($q) $url .= "?$q";
        header("location: $url");
    }
}
