<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths(
        [
        __DIR__ . '/inc',
        __DIR__ . '/language',
        __DIR__ . '/work',
        ]
    );

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

    // define sets of rules
    $rectorConfig->sets(
        [
        LevelSetList::UP_TO_PHP_82
        ]
    );
    
    
    // exclude a directory from Rector
    $rectorConfig->skip(
        [
        __DIR__ . '/work', // exclude the whole work directory
        __DIR__ . '/inc/config/*.conf.php', // exclude all files with .conf.php extension in the inc directory
        __DIR__ . '/vendor', // exclude the whole vendor directory        
        ]
    );
};    
    
