<?php

namespace src;

class ContainerManager
{
    private array $containers;

    public function __construct(
        array $containers,
    ) {
        $this->containers = $containers;
    }

    public function calculate(array $boxes): array
    {
        $containerUsage = [];

        foreach ($boxes as $transportId => $transportBoxes) {
            $containerCount = [];

            foreach ($this->containers as $container) {
                $containerCount[$container->type] = 0;
            }

            while (!empty($transportBoxes)) {
                foreach ($this->containers as $container) {
                    if ($this->fitBoxesInContainer($container, $transportBoxes)) {
                        $containerCount[$container->type]++;

                        break;
                    }
                }
            }

            $containerUsage[$transportId] = $containerCount;
        }

        return $containerUsage;
    }

    private function fitBoxesInContainer(Container $container, array &$boxes): bool
    {
        $remainingWidth = $container->width;
        $remainingHeight = $container->height;
        $remainingLength = $container->length;

        $fittedBoxes = [];

        foreach ($boxes as $key => $box) {
            if ($box->width <= $remainingWidth && $box->height <= $remainingHeight && $box->length <= $remainingLength) {
                $remainingWidth -= $box->width;
                $remainingHeight -= $box->height;
                $remainingLength -= $box->length;

                $fittedBoxes[] = $box;
                unset($boxes[$key]);
            }
        }

        return !empty($fittedBoxes);
    }
}