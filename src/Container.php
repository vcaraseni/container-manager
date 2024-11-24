<?php

namespace src;

class Container
{
    private string $type;
    private float $width;
    private float $height;
    private float $length;
    private array $packages = [];

    public function __construct(string $type, float $width, float $height, float $length) {
        $this->type = $type;
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
    }

    public function addPackage(Package $package): bool {
        if ($this->canFitPackage($package)) {
            $this->packages[] = $package;
            return true;
        }
        return false;
    }

    public function canFitPackage(Package $package): bool {
        return $package->getWidth() <= $this->width &&
            $package->getHeight() <= $this->height &&
            $package->getLength() <= $this->length;
    }

    public function getVolume(): float {
        return $this->width * $this->height * $this->length;
    }

    public function getPackageCount(): int {
        return count($this->packages);
    }
}