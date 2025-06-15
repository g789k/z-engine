<?php
/**
 * Z-Engine framework - Minimal Core
 *
 * @copyright Copyright 2019, Lisachenko Alexander <lisachenko.it@gmail.com>
 */
declare(strict_types=1);

namespace ZEngine;

use FFI;
use FFI\CData;
use ZEngine\System\Executor;

/**
 * Minimal Core class for Z-Engine functionality
 */
class Core
{
    // Class modifier flags
    public const ZEND_ACC_FINAL = (1 << 5);
    public const ZEND_ACC_ABSTRACT = (1 << 6);
    public const ZEND_ACC_EXPLICIT_ABSTRACT_CLASS = (1 << 6);
    public const ZEND_ACC_IMPLICIT_ABSTRACT_CLASS = (1 << 4);
    
    // Trait flag
    public const ZEND_ACC_IMPLEMENT_TRAITS = (1 << 15);
    
    // Operation results
    public const SUCCESS = 0;
    public const FAILURE = -1;

    public static Executor $executor;
    private static FFI $engine;

    /**
     * Performs Z-engine core initialization
     */
    public static function init(): void
    {
        $isThreadSafe = ZEND_THREAD_SAFE;
        $is64BitPlatform = PHP_INT_SIZE === 8;

        if ($isThreadSafe || !$is64BitPlatform) {
            throw new \RuntimeException('Only x64 non thread-safe versions of PHP are supported');
        }

        if (!extension_loaded('ffi')) {
            throw new \RuntimeException('FFI extension is required');
        }

        $headerFile = __DIR__ . '/../include/minimal_engine.h';
        if (!file_exists($headerFile)) {
            throw new \RuntimeException('Header file not found: ' . $headerFile);
        }

        self::$engine = FFI::load($headerFile);
        self::$executor = new Executor();
    }

    /**
     * Cast memory at given pointer to another type
     */
    public static function cast(string $type, CData $pointer): CData
    {
        return self::$engine->cast($type, $pointer);
    }

    /**
     * Get size of a type
     */
    public static function sizeof(string $type): int
    {
        return FFI::sizeof(self::$engine->type($type));
    }

    /**
     * Get FFI type
     */
    public static function type(string $type): FFI\CType
    {
        return self::$engine->type($type);
    }

    /**
     * Allocate memory
     */
    public static function new(string $type, bool $owned = true, bool $persistent = false): CData
    {
        return self::$engine->new($type, $owned, $persistent);
    }

    /**
     * Copy memory
     */
    public static function memcpy(CData $dest, CData $src, int $size): void
    {
        FFI::memcpy($dest, $src, $size);
    }
}