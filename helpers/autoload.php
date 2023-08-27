<?php

(static function () {
    $files = [
        'amount.php',
        'bundles.php',
    ];

    foreach ($files as $file) {
        require __DIR__ . "/{$file}";
    }
})();
