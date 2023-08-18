<?php

declare (strict_types=1);
namespace RectorPrefix202308\Symplify\EasyParallel;

use RectorPrefix202308\Fidry\CpuCoreCounter\CpuCoreCounter;
use RectorPrefix202308\Fidry\CpuCoreCounter\NumberOfCpuCoreNotFound;
/**
 * @api
 */
final class CpuCoreCountProvider
{
    /**
     * @var int
     */
    private const DEFAULT_CORE_COUNT = 2;
    public function provide() : int
    {
        try {
            return (new CpuCoreCounter())->getCount();
        } catch (NumberOfCpuCoreNotFound) {
            return self::DEFAULT_CORE_COUNT;
        }
    }
}
