<?php

namespace src;

class Package
{
    private float $width;
    private float $height;
    private float $length;

    public function __construct(float $width, float $height, float $length) {
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
    }

    public function getWidth(): float {
        return $this->width;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function getLength(): float {
        return $this->length;
    }

    public function getVolume(): float {
        return $this->width * $this->height * $this->length;
    }
}