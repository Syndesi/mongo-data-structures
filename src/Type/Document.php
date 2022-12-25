<?php

declare(strict_types=1);

namespace Syndesi\MongoDataStructures\Type;

use Syndesi\MongoDataStructures\Contract\DocumentInterface;

class Document implements DocumentInterface
{
    /**
     * @var array<string, mixed>
     */
    private array $properties = [];

    public function getIdentifier(): mixed
    {
        if (array_key_exists('_id', $this->properties)) {
            return $this->properties['_id'];
        }

        return null;
    }

    public function setIdentifier(mixed $identifier): DocumentInterface
    {
        $this->properties['_id'] = $identifier;

        return $this;
    }

    public function addProperty(string $name, mixed $value = null): self
    {
        $this->properties[$name] = $value;

        return $this;
    }

    public function addProperties(iterable $properties): self
    {
        foreach ($properties as $name => $value) {
            $this->properties[$name] = $value;
        }

        return $this;
    }

    public function hasProperty(string $name): bool
    {
        return array_key_exists($name, $this->properties);
    }

    public function getProperty(string $name): mixed
    {
        return $this->properties[$name];
    }

    /**
     * @return array<string, mixed>
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function removeProperty(string $name): self
    {
        unset($this->properties[$name]);

        return $this;
    }

    public function removeProperties(): self
    {
        $this->properties = [];

        return $this;
    }
}
