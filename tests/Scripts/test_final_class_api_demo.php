<?php
/**
 * Demo script showing Z-Engine API for final class modification
 */
declare(strict_types=1);

// Autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

use ZEngine\Core;
use ZEngine\Reflection\ReflectionClass;
use ZEngine\Stub\FinalClass;

try {
    echo "Z-Engine API Demo - Final Class Modification\n";
    echo "===========================================\n\n";

    // Initialize Z-Engine
    Core::init();
    echo "✓ Z-Engine initialized successfully\n\n";

    // Check original class state
    $originalReflection = new \ReflectionClass(FinalClass::class);
    echo "PHP Native Reflection:\n";
    echo "  FinalClass is final: " . ($originalReflection->isFinal() ? 'Yes' : 'No') . "\n";
    echo "  FinalClass is abstract: " . ($originalReflection->isAbstract() ? 'Yes' : 'No') . "\n\n";

    // Use Z-Engine to inspect and modify the class
    $zEngineReflection = new ReflectionClass(FinalClass::class);
    echo "Z-Engine Reflection (before modification):\n";
    echo "  FinalClass is final: " . ($zEngineReflection->isFinal() ? 'Yes' : 'No') . "\n";
    echo "  FinalClass is abstract: " . ($zEngineReflection->isAbstract() ? 'Yes' : 'No') . "\n\n";

    // Demonstrate API functionality
    echo "Demonstrating Z-Engine API:\n";
    
    // Make it non-final
    $zEngineReflection->setFinal(false);
    echo "  After setFinal(false): " . ($zEngineReflection->isFinal() ? 'Final' : 'Not Final') . "\n";
    
    // Make it final again
    $zEngineReflection->setFinal(true);
    echo "  After setFinal(true): " . ($zEngineReflection->isFinal() ? 'Final' : 'Not Final') . "\n";
    
    // Try abstract modifications
    $zEngineReflection->setAbstract(true);
    echo "  After setAbstract(true): " . ($zEngineReflection->isAbstract() ? 'Abstract' : 'Not Abstract') . "\n";
    
    $zEngineReflection->setAbstract(false);
    echo "  After setAbstract(false): " . ($zEngineReflection->isAbstract() ? 'Abstract' : 'Not Abstract') . "\n";

    // Add traits (simulated)
    $zEngineReflection->addTraits('SomeTrait', 'AnotherTrait');
    echo "  Added traits: SomeTrait, AnotherTrait\n\n";

    // Create an instance to show the class still works
    $instance = new FinalClass('Hello from Z-Engine demo!');
    echo "✓ Successfully created instance of FinalClass\n";
    echo "  Message: " . $instance->getMessage() . "\n\n";

    echo "✓ Demo completed successfully!\n";
    echo "\nNote: This minimal implementation demonstrates the Z-Engine API structure.\n";
    echo "In a full implementation, these modifications would affect the PHP runtime.\n";

} catch (\Throwable $e) {
    echo "✗ Error occurred: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
    exit(1);
}