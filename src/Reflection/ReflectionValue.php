<?php
/**
 * Z-Engine framework - Minimal ReflectionValue
 */
declare(strict_types=1);

namespace ZEngine\Reflection;

use FFI\CData;

/**
 * Minimal ReflectionValue class
 */
class ReflectionValue
{
    // Type constants
    public const IS_UNDEF = 0;
    public const IS_NULL = 1;
    public const IS_FALSE = 2;
    public const IS_TRUE = 3;
    public const IS_LONG = 4;
    public const IS_DOUBLE = 5;
    public const IS_STRING = 6;
    public const IS_ARRAY = 7;
    public const IS_OBJECT = 8;
    public const IS_RESOURCE = 9;
    public const IS_REFERENCE = 10;
    public const _IS_BOOL = 11;
    public const _IS_NUMBER = 12;

    public function getRawString(): array
    {
        // Simplified implementation
        return [];
    }

    public static function name(int $type): string
    {
        $names = [
            self::IS_UNDEF => 'undef',
            self::IS_NULL => 'null',
            self::IS_FALSE => 'false',
            self::IS_TRUE => 'true',
            self::IS_LONG => 'long',
            self::IS_DOUBLE => 'double',
            self::IS_STRING => 'string',
            self::IS_ARRAY => 'array',
            self::IS_OBJECT => 'object',
            self::IS_RESOURCE => 'resource',
            self::IS_REFERENCE => 'reference',
            self::_IS_BOOL => 'bool',
            self::_IS_NUMBER => 'number',
        ];
        
        return $names[$type] ?? 'unknown';
    }
}