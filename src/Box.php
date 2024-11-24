<?php

namespace src;

class Box
{
    public float $width;
    public float $height;
    public float $length;

    public function __construct(
        float $width,
        float $height,
        float $length,
    ) {
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
    }
}