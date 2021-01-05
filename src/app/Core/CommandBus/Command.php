<?php

namespace App\Core\CommandBus;

use ReflectionClass;
use ReflectionProperty;

abstract class Command
{
    public function handlePayload(array $payload): self
    {
        $reflection = new ReflectionClass($this);
        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property)
            $property->setValue($this, $payload[$property->getName()] ?? null);
        return $this;
    }
}
