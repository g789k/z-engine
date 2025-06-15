<?php
/**
 * Z-Engine framework - Minimal ExecutionData
 */
declare(strict_types=1);

namespace ZEngine\System;

use ZEngine\Reflection\ReflectionValue;

/**
 * Minimal ExecutionData class
 */
class ExecutionData
{
    public function getArgument(int $index): ReflectionValue
    {
        // This is a simplified implementation
        // In the real implementation, this would access the actual execution stack
        return new ReflectionValue();
    }
}