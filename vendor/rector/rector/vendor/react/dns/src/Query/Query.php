<?php

namespace RectorPrefix202308\React\Dns\Query;

use RectorPrefix202308\React\Dns\Model\Message;
/**
 * This class represents a single question in a query/response message
 *
 * It uses a structure similar to `\React\Dns\Message\Record`, but does not
 * contain fields for resulting TTL and resulting record data (IPs etc.).
 *
 * @link https://tools.ietf.org/html/rfc1035#section-4.1.2
 * @see \React\Dns\Message\Record
 */
final class Query
{
    /**
     * @param string $name  query name, i.e. hostname to look up
     * @param int    $type  query type, see Message::TYPE_* constants
     * @param int    $class query class, see Message::CLASS_IN constant
     */
    public function __construct(public $name, public $type, public $class)
    {
    }
    /**
     * Describes the hostname and query type/class for this query
     *
     * The output format is supposed to be human readable and is subject to change.
     * The format is inspired by RFC 3597 when handling unkown types/classes.
     *
     * @return string "example.com (A)" or "example.com (CLASS0 TYPE1234)"
     * @link https://tools.ietf.org/html/rfc3597
     */
    public function describe()
    {
        $class = $this->class !== Message::CLASS_IN ? 'CLASS' . $this->class . ' ' : '';
        $type = 'TYPE' . $this->type;
        $ref = new \ReflectionClass(\RectorPrefix202308\React\Dns\Model\Message::class);
        foreach ($ref->getConstants() as $name => $value) {
            if ($value === $this->type && str_starts_with($name, 'TYPE_')) {
                $type = \substr($name, 5);
                break;
            }
        }
        return $this->name . ' (' . $class . $type . ')';
    }
}
