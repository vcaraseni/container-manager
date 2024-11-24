<?php

use src\ContainerManager;

// Packages data
$packages = [
    [
        ['quantity' => 27, 'width' => 78, 'height' => 79, 'length' => 93],
    ],
    [
        ['quantity' => 24, 'width' => 30, 'height' => 60, 'length' => 90],
        ['quantity' => 33, 'width' => 75, 'height' => 100, 'length' => 200],
    ],
    [
        ['quantity' => 10, 'width' => 80, 'height' => 100, 'length' => 200],
        ['quantity' => 25, 'width' => 60, 'height' => 80, 'length' => 150],
    ]
];
$manager = new ContainerManager();

foreach ($packages as $index => $package) {
    echo 'Transport ' . ($index + 1) . ":\n";

    $results = $manager->calculateContainers($package);
    foreach ($results as $result) {
        echo ' - Containers needed: ' . $result . "\n";
    }

    echo "\n";
}
