<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
 */

$header = <<<'EOF'
This file is part of the Worldia presentation bundle package.
(c) Christian Daguerre <cdaguerre@worldia.com>
EOF;

return PhpCsFixer\Config::create()
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'header_comment' => ['header' => $header],
        'array_syntax' => ['syntax' => 'short'],
        'php_unit_construct' => true,
        'php_unit_strict' => true,
        'strict_param' => true,
        'binary_operator_spaces' => false,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('tests')
            ->in(__DIR__)
    )
;
