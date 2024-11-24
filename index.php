<?php

use src\ContainerManager;

// Transport data
$transports = [
    [
        'quantity' => 27, // rectangle boxes
        'width' => 78,
        'height' => 79,
        'length' => 93,
    ],
    [
        ['quantity' => 24, 'width' => 30, 'height' => 60, 'length' => 90], // rectangular packages
        ['quantity' => 33, 'width' => 75, 'height' => 100, 'length' => 200],
    ],
    [
        ['quantity' => 10, 'width' => 80, 'height' => 100, 'length' => 200], // rectangular packages
        ['quantity' => 25, 'width' => 60, 'height' => 80, 'length' => 150],
    ],
];

// run calculations
$manager = new ContainerManager();

foreach ($transports as $index => $transport) {
    echo 'Transport ' . ($index + 1) . ':\n';

    $results = $manager->calculateContainers($transport);
    foreach ($results as $result) {
        echo ' - Containers needed: ' . $result . '\n';
    }

    echo '\n';
}
