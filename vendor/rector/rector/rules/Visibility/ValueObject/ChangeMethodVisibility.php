<?php

declare (strict_types=1);
namespace Rector\Visibility\ValueObject;

use Rector\Core\Validation\RectorAssert;
final readonly class ChangeMethodVisibility
{
    public function __construct(/**
     * @readonly
     */
    private string $class, /**
     * @readonly
     */
    private string $method, /**
     * @readonly
     */
    private int $visibility)
    {
        RectorAssert::className($class);
    }
    public function getClass() : string
    {
        return $this->class;
    }
    public function getMethod() : string
    {
        return $this->method;
    }
    public function getVisibility() : int
    {
        return $this->visibility;
    }
}
