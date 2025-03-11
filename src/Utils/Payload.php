<?php

declare(strict_types=1);

/*
 * This file is part of package ang3/php-psp-systempay-client
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ang3\Component\PSP\Systempay\Utils;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

class Payload
{
    private PropertyAccessorInterface $propertyAccessor;

    /**
     * @param array<string, mixed> $payload
     */
    public function __construct(private readonly array $payload)
    {
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
    }

    public function __toString(): string
    {
        return $this->getObjectType();
    }

    public function __get(string $name): mixed
    {
        return $this->getValue($name);
    }

    public function getObjectType(): string
    {
        return (string) $this->getString('_type');
    }

    /**
     * @template T of \BackedEnum
     *
     * @param class-string<T> $enumClass
     *
     * @return T
     */
    public function getEnum(string $path, string $enumClass): ?\BackedEnum
    {
        $value = $this->getString($path);

        if (!class_exists($enumClass)) {
            throw new \InvalidArgumentException(\sprintf('The enum class "%s" does not exist.', $enumClass));
        }

        if (!\in_array(\BackedEnum::class, class_implements($enumClass), true)) {
            throw new \InvalidArgumentException('Expected enum class FQCN.');
        }

        return null !== $value ? $enumClass::tryFrom($value) : null;
    }

    public function getPayload(string $path): self
    {
        return new self((array) $this->getArray($path, []));
    }

    /**
     * @throws \Exception on invalid date as string
     */
    public function getDate(string $path): ?\DateTimeInterface
    {
        $value = $this->getString($path);

        return $value ? new \DateTime($value) : null;
    }

    public function getBoolean(string $path, ?bool $defaultValue = null): ?bool
    {
        $value = $this->getScalar($path, $defaultValue);

        return null !== $value ? (bool) $value : $defaultValue;
    }

    public function getInteger(string $path, ?int $defaultValue = null): ?int
    {
        $value = $this->getScalar($path, $defaultValue);

        return null !== $value ? (int) $value : $defaultValue;
    }

    public function getFloat(string $path, ?float $defaultValue = null): ?float
    {
        $value = $this->getScalar($path, $defaultValue);

        return null !== $value ? (float) $value : $defaultValue;
    }

    public function getString(string $path, ?string $defaultValue = null): ?string
    {
        $value = $this->getScalar($path, $defaultValue);

        return null !== $value ? (string) $value : $defaultValue;
    }

    public function getScalar(string $path, int|bool|float|string|null $defaultValue = null): int|bool|float|string|null
    {
        $value = $this->getValue($path, $defaultValue);

        if (null === $value) {
            return $defaultValue;
        }

        if (!\is_scalar($value)) {
            throw new \InvalidArgumentException(\sprintf('Expected property "%s" of type "scalar", got "%s".', $path, \gettype($value)));
        }

        return $value;
    }

    /**
     * @param array<string, mixed>|null $defaultValue
     *
     * @return array<string, mixed>|null
     */
    public function getArray(string $path, ?array $defaultValue = null): ?array
    {
        $value = $this->getValue($path, $defaultValue);

        return null !== $value ? (array) $value : $defaultValue;
    }

    public function getValue(string $path, mixed $defaultValue = null): mixed
    {
        $path = $this->normalizePath($path);

        if (!$this->propertyAccessor->isReadable($this->payload, $path)) {
            return $defaultValue;
        }

        return $this->propertyAccessor->getValue($this->payload, $path);
    }

    protected function normalizePath(string $path): string
    {
        $parts = explode('.', $path);

        foreach ($parts as $key => $part) {
            if (!str_starts_with($part, '[')) {
                $parts[$key] = "[{$part}]";
            }
        }

        return implode('', $parts);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->payload;
    }
}
