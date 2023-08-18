<?php

declare (strict_types=1);
namespace Rector\Core\ValueObject\Error;

use Rector\Parallel\ValueObject\Name;
use RectorPrefix202308\Symplify\EasyParallel\Contract\SerializableInterface;
final readonly class SystemError implements SerializableInterface
{
    public function __construct(
        /**
         * @readonly
         */
        private string $message,
        /**
         * @readonly
         */
        private ?string $relativeFilePath = null,
        /**
         * @readonly
         */
        private ?int $line = null,
        /**
         * @readonly
         */
        private ?string $rectorClass = null
    )
    {
    }
    public function getMessage() : string
    {
        return $this->message;
    }
    public function getFile() : ?string
    {
        return $this->relativeFilePath;
    }
    public function getLine() : ?int
    {
        return $this->line;
    }
    public function getRelativeFilePath() : ?string
    {
        return $this->relativeFilePath;
    }
    /**
     * @return array{message: string, relative_file_path: string|null, line: int|null, rector_class: string|null}
     */
    public function jsonSerialize() : array
    {
        return [Name::MESSAGE => $this->message, Name::RELATIVE_FILE_PATH => $this->relativeFilePath, Name::LINE => $this->line, Name::RECTOR_CLASS => $this->rectorClass];
    }
    /**
     * @param mixed[] $json
     */
    public static function decode(array $json) : SerializableInterface
    {
        return new self($json[Name::MESSAGE], $json[Name::RELATIVE_FILE_PATH], $json[Name::LINE], $json[Name::RECTOR_CLASS]);
    }
    public function getRectorClass() : ?string
    {
        return $this->rectorClass;
    }
}
