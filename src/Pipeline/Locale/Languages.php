<?php

namespace Obelaw\Framework\Pipeline\Locale;

class Languages
{
    public static $language = [
        'en' => 'English'
    ];

    public static function setLanguage($alpha2, $label)
    {
        $language = [$alpha2 => $label];

        static::$language = array_merge(static::$language, $language);
    }

    public static function getLanguages()
    {
        return static::$language;
    }
}
