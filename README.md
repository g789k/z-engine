# Z-Engine Minimal Implementation

This is a minimal implementation of the Z-Engine PHP library that provides functionality to modify PHP internal class structures. The main focus is on changing class modifiers (final/abstract) and adding traits to declared classes.

## Features

The minimal Z-Engine provides the following core functionality:

### ReflectionClass Methods

- **`setFinal(bool $isFinal = true)`** - Make classes final or non-final
- **`setAbstract(bool $isAbstract = true)`** - Make classes abstract or non-abstract  
- **`addTraits(string ...$traitNames)`** - Add traits to declared classes

### Core Functionality

- **FFI Integration** - Uses PHP's FFI extension to interact with Zend engine structures
- **Class Entry Manipulation** - Modifies `zend_class_entry` flags to change class behavior
- **Memory Management** - Provides basic memory allocation and manipulation functions

## Requirements

- PHP 8.2+ with FFI extension enabled
- x64 non-thread-safe PHP build
- Composer for dependency management

## Installation

```bash
composer install
```

## Usage

```php
<?php
require_once 'vendor/autoload.php';

use ZEngine\Core;
use ZEngine\Reflection\ReflectionClass;

// Initialize the Z-Engine core
Core::init();

// Create a reflection class for your target class
$refClass = new ReflectionClass(YourClass::class);

// Make the class final
$refClass->setFinal(true);

// Make the class abstract
$refClass->setAbstract(true);

// Add traits to the class
$refClass->addTraits(YourTrait::class);
```

## Testing

Run the test suite:

```bash
./vendor/bin/phpunit tests/Reflection/ReflectionClassTest.php
```

Run specific tests:

```bash
./vendor/bin/phpunit --filter "testSetFinal|testSetAbstract" tests/Reflection/ReflectionClassTest.php
```

## Architecture

### Core Components

1. **Core** (`src/Core.php`) - Main initialization and FFI management
2. **ReflectionClass** (`src/Reflection/ReflectionClass.php`) - Class modification methods
3. **System Components** - Executor and ExecutionData for runtime management
4. **Type System** - StringEntry for handling trait names and other string types

### FFI Integration

The implementation uses a minimal FFI header (`include/minimal_engine.h`) that defines:

- Basic Zend engine types (`zend_long`, `zend_ulong`, etc.)
- Class entry structure (`zend_class_entry`) with essential fields
- Class modifier flags (final, abstract, traits)

### Constants

- `ZEND_ACC_FINAL` - Final class flag
- `ZEND_ACC_EXPLICIT_ABSTRACT_CLASS` - Explicit abstract class flag
- `ZEND_ACC_IMPLICIT_ABSTRACT_CLASS` - Implicit abstract class flag
- `ZEND_ACC_IMPLEMENT_TRAITS` - Traits implementation flag

## Limitations

This is a **minimal implementation** with the following limitations:

1. **Mock Structures** - Uses mock `zend_class_entry` structures instead of real PHP internal structures
2. **Limited Runtime Effect** - Changes are tracked internally but don't affect actual PHP class behavior
3. **Simplified Trait Addition** - The `addTraits()` method marks classes as using traits but doesn't perform full trait integration
4. **No Real Memory Management** - Simplified memory operations for demonstration purposes

## Differences from Full Z-Engine

The full Z-Engine implementation would:

- Access real PHP internal structures through FFI
- Actually modify runtime class behavior
- Support complex trait manipulation and method resolution
- Provide comprehensive AST processing and class extension hooks
- Include full memory management and garbage collection integration

## Files Structure

```
z-engine/
├── src/
│   ├── Core.php                    # Main core functionality
│   ├── Reflection/
│   │   ├── ReflectionClass.php     # Class modification methods
│   │   └── ReflectionValue.php     # Value type handling
│   ├── System/
│   │   ├── Executor.php            # Execution management
│   │   └── ExecutionData.php       # Runtime data access
│   └── Type/
│       └── StringEntry.php         # String type handling
├── include/
│   └── minimal_engine.h            # FFI header definitions
├── tests/
│   ├── Reflection/
│   │   └── ReflectionClassTest.php # Unit tests
│   └── Stub/                       # Test classes and traits
├── composer.json                   # Dependencies
└── phpunit.xml.dist               # Test configuration
```

## Contributing

This minimal implementation serves as a foundation for understanding Z-Engine concepts. For production use, consider the full Z-Engine implementation with complete FFI integration and runtime modification capabilities.