<?php

if (!function_exists('tokenGenerate')) {
    function tokenGenerate()
    {
        return base64_encode(md5(date('Y-m-d H:i:s') . config('app.name')));
    }
}
