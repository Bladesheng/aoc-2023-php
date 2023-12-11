<?php

$total = 0;

$LIMITS = [
    'red' => 12,
    'green' => 13,
    'blue' => 14,
];

foreach (file("input.txt") as $lineNumber => $line) {
    // echo $line . "\n";

    preg_match('/Game\s+(\d+)/', $line, $matches);
    $id = $matches[1];

    $sets = explode(";", $line);

    $valid = true;

    foreach ($sets as $setIndex => $set) {
        $pattern = '/(\d+)\s+([a-zA-Z]+)/';
        preg_match_all($pattern, $set, $matches);

        $cubesArr = $matches[1];
        $colors = $matches[2];

        for ($i = 0; $i < count($colors); $i++) {
            $color = $colors[$i];
            $cubes = $cubesArr[$i];

            if ($cubes > $LIMITS[$color]) {
                $valid = false;
                break;
            }
        }
    }

    if ($valid) {
        $total += $id;
    }
}
echo 'total is: ' . $total;
