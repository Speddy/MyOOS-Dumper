<?php
/**
   ----------------------------------------------------------------------

   MyOOS [Shopsystem]
   //www.oos-shop.de

   Copyright (c) 2013 - 2024 by the MyOOS Development Team.
   ----------------------------------------------------------------------
 */


$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
;