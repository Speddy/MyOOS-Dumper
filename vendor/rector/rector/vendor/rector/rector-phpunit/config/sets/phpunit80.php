<?php

declare (strict_types=1);
namespace RectorPrefix202308;

use PHPStan\Type\MixedType;
use PHPStan\Type\VoidType;
use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\MethodName;
use Rector\PHPUnit\PHPUnit80\Rector\MethodCall\AssertEqualsParameterToSpecificMethodsTypeRector;
use Rector\PHPUnit\PHPUnit80\Rector\MethodCall\SpecificAssertContainsRector;
use Rector\PHPUnit\PHPUnit80\Rector\MethodCall\SpecificAssertInternalTypeRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\ValueObject\AddParamTypeDeclaration;
use Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration;
return static function (RectorConfig $rectorConfig) : void {
    $rectorConfig->rules([SpecificAssertInternalTypeRector::class, AssertEqualsParameterToSpecificMethodsTypeRector::class, SpecificAssertContainsRector::class]);
    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
        # https://github.com/sebastianbergmann/phpunit/issues/3123
        'PHPUnit_Framework_MockObject_MockObject' => 'PHPUnit\\Framework\\MockObject\\MockObject',
    ]);
    $rectorConfig->ruleWithConfiguration(AddParamTypeDeclarationRector::class, [
        // https://github.com/rectorphp/rector/issues/1024 - no type, $dataName
        new AddParamTypeDeclaration(\PHPUnit\Framework\TestCase::class, MethodName::CONSTRUCT, 2, new MixedType()),
    ]);
    $rectorConfig->ruleWithConfiguration(AddReturnTypeDeclarationRector::class, [new AddReturnTypeDeclaration(\PHPUnit\Framework\TestCase::class, 'setUpBeforeClass', new VoidType()), new AddReturnTypeDeclaration(\PHPUnit\Framework\TestCase::class, 'setUp', new VoidType()), new AddReturnTypeDeclaration(\PHPUnit\Framework\TestCase::class, 'assertPreConditions', new VoidType()), new AddReturnTypeDeclaration(\PHPUnit\Framework\TestCase::class, 'assertPostConditions', new VoidType()), new AddReturnTypeDeclaration(\PHPUnit\Framework\TestCase::class, 'tearDown', new VoidType()), new AddReturnTypeDeclaration(\PHPUnit\Framework\TestCase::class, 'tearDownAfterClass', new VoidType()), new AddReturnTypeDeclaration(\PHPUnit\Framework\TestCase::class, 'onNotSuccessfulTest', new VoidType())]);
};
