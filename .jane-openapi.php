<?php

return [
    'openapi-file' => __DIR__ . '/resources/touchsms.json',
    'namespace' => 'TouchSms\ApiClient\Api',
    'directory' => __DIR__ . '/generated/',
    'reference' => true,
    'strict' => false,
    'clean-generated' => true,
    'use-fixer' => true,
    'fixer-config-file' => __DIR__ . '/.php-cs-fixer.php',
];
