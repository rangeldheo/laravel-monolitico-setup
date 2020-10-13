<?php

if (!function_exists('tokenGenerate')) {
    function tokenGenerate()
    {
        return uniqid(md5(date('Y-m-d H:i:s') . config('app.name')));
    }
}
