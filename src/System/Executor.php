<?php
/**
 * Z-Engine framework - Minimal Executor
 */
declare(strict_types=1);

namespace ZEngine\System;

use ZEngine\Core;

/**
 * Minimal Executor class
 */
class Executor
{
    private ExecutionData $executionData;

    public function __construct()
    {
        $this->executionData = new ExecutionData();
    }

    public function getExecutionState(): ExecutionData
    {
        return $this->executionData;
    }
}