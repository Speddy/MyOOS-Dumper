<?php

namespace RectorPrefix202308\React\Socket;

/**
 * Decorates an existing Connector to always use a fixed, preconfigured URI
 *
 * This can be useful for consumers that do not support certain URIs, such as
 * when you want to explicitly connect to a Unix domain socket (UDS) path
 * instead of connecting to a default address assumed by an higher-level API:
 *
 * ```php
 * $connector = new React\Socket\FixedUriConnector(
 *     'unix:///var/run/docker.sock',
 *     new React\Socket\UnixConnector()
 * );
 *
 * // destination will be ignored, actually connects to Unix domain socket
 * $promise = $connector->connect('localhost:80');
 * ```
 */
class FixedUriConnector implements ConnectorInterface
{
    /**
     * @param string $uri
     */
    public function __construct(private $uri, private readonly ConnectorInterface $connector)
    {
    }
    public function connect($_)
    {
        return $this->connector->connect($this->uri);
    }
}
