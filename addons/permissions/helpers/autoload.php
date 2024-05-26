<?php

(static function () {
    $files = [
        'permissions.php',
    ];

    foreach ($files as $file) {
        require __DIR__ . "/{$file}";
    }
})();
