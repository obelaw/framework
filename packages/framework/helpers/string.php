<?php

use Illuminate\Support\Str;

if (!function_exists('str_random')) {

    /** * Generate a Random String / Number.
     *
     * @return \Illuminate\Support\Str;
     * @param type is INT or STR as default ;
     */
    function str_random(int $length = 10, string $type = 'str')
    {
        if (strtolower($type) === 'int') {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        return Str::random($length);
    }
}
