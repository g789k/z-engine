<?php
/**
 * Z-Engine framework - Minimal StringEntry
 */
declare(strict_types=1);

namespace ZEngine\Type;

use FFI\CData;
use ZEngine\Core;

/**
 * Minimal StringEntry class for trait name handling
 */
class StringEntry
{
    private CData $pointer;

    public function __construct(string $value)
    {
        // Simplified implementation for trait names
        // In the real implementation, this would extract from execution state
        $valueArgument = Core::$executor->getExecutionState()->getArgument(0);
        $this->pointer = $valueArgument->getRawString()[0] ?? null;
    }

    public static function fromCData(CData $stringPointer): self
    {
        $instance = new self('');
        $instance->pointer = $stringPointer;
        return $instance;
    }

    public function getPointer(): CData
    {
        return $this->pointer;
    }
}