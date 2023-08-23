<?php

(static function () {
    $files = [
        'bundles.php',
    ];

    foreach ($files as $file) {
        require __DIR__ . "/{$file}";
    }
})();
