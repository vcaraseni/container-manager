<?php

namespace src;

class Container
{
    public string $type;
    public float $width;
    public float $height;
    public float $length;

    public function __construct(
        string $type,
        float $width,
        float $height,
        float $length,
    ) {
        $this->type = $type;
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
    }
}