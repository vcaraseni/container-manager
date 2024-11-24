<?php

namespace src;

class ContainerManager {
    private array $containers;

    public function __construct() {
        $this->containers = [
            new Container('40ft', 234.8, 238.44, 1203.1),
            new Container('10ft', 234.8, 238.44, 279.4)
        ];
    }

    public function calculateContainers(array $packages): array {
        $results = [];

        foreach ($packages as $packageData) {
            $requiredContainers = [];
            $remainingPackages = $packageData['quantity'];

            foreach ($this->containers as $container) {
                while ($remainingPackages > 0) {
                    $containerCopy = clone $container;
                    $currentFit = 0;

                    for ($i = 0; $i < $remainingPackages; $i++) {
                        $package = new Package(
                            $packageData['width'],
                            $packageData['height'],
                            $packageData['length']
                        );

                        if ($containerCopy->addPackage($package)) {
                            $currentFit++;
                        } else {
                            break;
                        }
                    }

                    $remainingPackages -= $currentFit;
                    $requiredContainers[] = $containerCopy;
                }
            }

            $results[] = count($requiredContainers);
        }

        return $results;
    }
}