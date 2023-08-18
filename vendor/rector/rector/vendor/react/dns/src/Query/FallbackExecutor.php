<?php

namespace RectorPrefix202308\React\Dns\Query;

use RectorPrefix202308\React\Promise\Promise;
final class FallbackExecutor implements ExecutorInterface
{
    public function __construct(private readonly ExecutorInterface $executor, private ExecutorInterface $fallback)
    {
    }
    public function query(Query $query)
    {
        $cancelled = \false;
        $fallback = $this->fallback;
        $promise = $this->executor->query($query);
        return new Promise(function ($resolve, $reject) use(&$promise, $fallback, $query, &$cancelled) {
            $promise->then($resolve, function (\Exception $e1) use($fallback, $query, $resolve, $reject, &$cancelled, &$promise) {
                // reject if primary resolution rejected due to cancellation
                if ($cancelled) {
                    $reject($e1);
                    return;
                }
                // start fallback query if primary query rejected
                $promise = $fallback->query($query)->then($resolve, function (\Exception $e2) use($e1, $reject) {
                    $append = $e2->getMessage();
                    if (($pos = \strpos($append, ':')) !== \false) {
                        $append = \substr($append, $pos + 2);
                    }
                    // reject with combined error message if both queries fail
                    $reject(new \RuntimeException($e1->getMessage() . '. ' . $append));
                });
            });
        }, function () use(&$promise, &$cancelled) {
            // cancel pending query (primary or fallback)
            $cancelled = \true;
            $promise->cancel();
        });
    }
}
