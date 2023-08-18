<?php

declare(strict_types=1);

namespace League\Flysystem;

use LogicException;

class UnableToMountFilesystem extends LogicException implements FilesystemException
{
    public static function becauseTheKeyIsNotValid(mixed $key): UnableToMountFilesystem
    {
        return new UnableToMountFilesystem(
            'Unable to mount filesystem, key was invalid. String expected, received: ' . gettype($key)
        );
    }

    public static function becauseTheFilesystemWasNotValid(mixed $filesystem): UnableToMountFilesystem
    {
        $received = get_debug_type($filesystem);

        return new UnableToMountFilesystem(
            'Unable to mount filesystem, filesystem was invalid. Instance of ' . FilesystemOperator::class . ' expected, received: ' . $received
        );
    }
}
