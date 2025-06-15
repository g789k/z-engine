<?php
/**
 * Z-Engine Minimal Implementation Example
 */
require_once __DIR__ . '/vendor/autoload.php';

use ZEngine\Core;
use ZEngine\Reflection\ReflectionClass;
use ZEngine\Stub\TestClass;
use ZEngine\Stub\TestTrait;

echo "Z-Engine Minimal Implementation Example\n";
echo "======================================\n\n";

// Initialize the Z-Engine core
Core::init();
echo "✓ Z-Engine core initialized\n\n";

// Create a reflection class for TestClass
$refClass = new ReflectionClass(TestClass::class);
echo "Working with class: " . TestClass::class . "\n";

// Show original state
echo "\nOriginal state:\n";
echo "  - Final: " . ($refClass->isFinal() ? 'Yes' : 'No') . "\n";
echo "  - Abstract: " . ($refClass->isAbstract() ? 'Yes' : 'No') . "\n";

// Demonstrate setFinal functionality
echo "\n--- Testing setFinal() ---\n";
$refClass->setFinal(true);
echo "After setFinal(true): " . ($refClass->isFinal() ? 'Final' : 'Not Final') . "\n";

$refClass->setFinal(false);
echo "After setFinal(false): " . ($refClass->isFinal() ? 'Final' : 'Not Final') . "\n";

// Demonstrate setAbstract functionality
echo "\n--- Testing setAbstract() ---\n";
$refClass->setAbstract(true);
echo "After setAbstract(true): " . ($refClass->isAbstract() ? 'Abstract' : 'Not Abstract') . "\n";

$refClass->setAbstract(false);
echo "After setAbstract(false): " . ($refClass->isAbstract() ? 'Abstract' : 'Not Abstract') . "\n";

// Demonstrate addTraits functionality
echo "\n--- Testing addTraits() ---\n";
echo "Original traits: " . implode(', ', $refClass->getTraitNames() ?: ['None']) . "\n";

$refClass->addTraits(TestTrait::class);
echo "After addTraits(): Method executed successfully\n";
echo "Note: In minimal implementation, trait addition is simulated\n";

echo "\n✓ All examples completed successfully!\n";
echo "\nNote: This minimal implementation demonstrates the API structure\n";
echo "but doesn't modify actual PHP class behavior at runtime.\n";