<?php

namespace RectorPrefix202308\React\Stream;

use RectorPrefix202308\Evenement\EventEmitter;
final class CompositeStream extends EventEmitter implements DuplexStreamInterface
{
    private bool $closed = \false;
    public function __construct(private readonly ReadableStreamInterface $readable, private readonly WritableStreamInterface $writable)
    {
        if (!$readable->isReadable() || !$writable->isWritable()) {
            $this->close();
            return;
        }
        Util::forwardEvents($this->readable, $this, ['data', 'end', 'error']);
        Util::forwardEvents($this->writable, $this, ['drain', 'error', 'pipe']);
        $this->readable->on('close', $this->close(...));
        $this->writable->on('close', $this->close(...));
    }
    public function isReadable()
    {
        return $this->readable->isReadable();
    }
    public function pause()
    {
        $this->readable->pause();
    }
    public function resume()
    {
        if (!$this->writable->isWritable()) {
            return;
        }
        $this->readable->resume();
    }
    public function pipe(WritableStreamInterface $dest, array $options = [])
    {
        return Util::pipe($this, $dest, $options);
    }
    public function isWritable()
    {
        return $this->writable->isWritable();
    }
    public function write($data)
    {
        return $this->writable->write($data);
    }
    public function end($data = null)
    {
        $this->readable->pause();
        $this->writable->end($data);
    }
    public function close()
    {
        if ($this->closed) {
            return;
        }
        $this->closed = \true;
        $this->readable->close();
        $this->writable->close();
        $this->emit('close');
        $this->removeAllListeners();
    }
}
