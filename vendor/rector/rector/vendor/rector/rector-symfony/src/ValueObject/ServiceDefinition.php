<?php

declare (strict_types=1);
namespace Rector\Symfony\ValueObject;

use Rector\Symfony\Contract\Tag\TagInterface;
final readonly class ServiceDefinition
{
    /**
     * @param TagInterface[] $tags
     */
    public function __construct(
        /**
         * @readonly
         */
        private string $id,
        /**
         * @readonly
         */
        private ?string $class,
        /**
         * @readonly
         */
        private bool $isPublic,
        /**
         * @readonly
         */
        private bool $isSynthetic,
        /**
         * @readonly
         */
        private ?string $alias,
        /**
         * @readonly
         */
        private array $tags
    )
    {
    }
    public function getId() : string
    {
        return $this->id;
    }
    public function getClass() : ?string
    {
        return $this->class;
    }
    public function isPublic() : bool
    {
        return $this->isPublic;
    }
    public function isSynthetic() : bool
    {
        return $this->isSynthetic;
    }
    public function getAlias() : ?string
    {
        return $this->alias;
    }
    /**
     * @return TagInterface[]
     */
    public function getTags() : array
    {
        return $this->tags;
    }
    public function getTag(string $name) : ?TagInterface
    {
        foreach ($this->tags as $tag) {
            if ($tag->getName() !== $name) {
                continue;
            }
            return $tag;
        }
        return null;
    }
}
