<?php

declare(strict_types=1);

namespace League\Flysystem\PhpseclibV3;

use phpseclib3\Net\SFTP;

class StubSftpConnectionProvider implements ConnectionProvider
{
    /**
     * @var SftpStub
     */
    private $connection;

    public function __construct(
        private readonly string $host,
        private readonly string $username,
        private readonly ?string $password = null,
        private readonly int $port = 22
    ) {
    }

    public function provideConnection(): SFTP
    {
        if ( ! $this->connection instanceof SFTP) {
            $connection = new SftpStub($this->host, $this->port);
            $connection->login($this->username, $this->password);

            $this->connection = $connection;
        }

        return $this->connection;
    }
}
