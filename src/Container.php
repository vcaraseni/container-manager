<?php

namespace src;

class Container
{
    private array $packages = [];

    public function __construct(
        private string $type,
        private float $width,
        private float $height,
        private float $length
    ) {
    }

    public function addPackage(Package $package): bool
    {
        if ($this->canFitPackage($package)) {
            $this->packages[] = $package;

            return true;
        }

        return false;
    }

    public function canFitPackage(Package $package): bool
    {
        return $package->getWidth() <= $this->width &&
            $package->getHeight() <= $this->height &&
            $package->getLength() <= $this->length;
    }
}