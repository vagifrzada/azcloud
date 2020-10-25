<?php

namespace App\CommandBus;

use ConvenientImmutability\Immutable;

/**
 * Class Command
 * @package App\CommandBusInterface
 */
class Command
{
    use Immutable;

    /** @var array  */
    protected $payload = [];

    private function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    public static function fromPayload(array $payload): Command
    {
        return new static($payload);
    }

    public function get(string $key, $default = null)
    {
        return $this->payload[$key] ?? $default;
    }

    public function toPayload(): array
    {
        return $this->payload;
    }
}
