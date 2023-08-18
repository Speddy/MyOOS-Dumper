<?php

namespace League\MimeTypeDetection;

class OverridingExtensionToMimeTypeMap implements ExtensionToMimeTypeMap
{
    /**
     * @param array<string, string>  $overrides
     */
    public function __construct(private readonly ExtensionToMimeTypeMap $innerMap, private array $overrides)
    {
    }

    public function lookupMimeType(string $extension): ?string
    {
        return $this->overrides[$extension] ?? $this->innerMap->lookupMimeType($extension);
    }
}
