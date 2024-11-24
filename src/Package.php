<?php

namespace src;

class Package
{
    public function __construct(
        private float $width,
        private float $height,
        private float $length
    ) {
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getLength(): float
    {
        return $this->length;
    }
}