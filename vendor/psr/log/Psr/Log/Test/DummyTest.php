<?php

namespace Psr\Log\Test;

/**
 * This class is internal and does not follow the BC promise.
 *
 * Do NOT use this class in any way.
 *
 * @internal
 */
class DummyTest implements \Stringable
{
    public function __toString(): string
    {
        return 'DummyTest';
    }
}
