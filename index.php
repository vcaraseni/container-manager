<?php

use src\Box;
use src\Container;
use src\ContainerManager;

// Container types
$containers = [
    new Container("40ft", 234.8, 238.44, 1203.1),
    new Container("10ft", 234.8, 238.44, 279.4),
];

$containerManager = new ContainerManager($containers);

$transportBoxes = [
    'Transport 1' => array_fill(0, 27, new Box(78, 79, 93)),
    'Transport 2' => array_merge(
        array_fill(0, 24, new Box(30, 60, 90)),
        array_fill(0, 33, new Box(75, 100, 200)),
    ),
    'Transport 3' => array_merge(
        array_fill(0, 10, new Box(80, 100, 200)),
        array_fill(0, 25, new Box(60, 80, 150)),
    )
];

$result = $containerManager->calculate($transportBoxes);

foreach ($result as $transportId => $counts) {
    echo "$transportId:\n";
    foreach ($counts as $type => $count) {
        echo "- $type: $count\n";
    }
}