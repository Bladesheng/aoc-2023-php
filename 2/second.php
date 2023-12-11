<?php

$total = 0;


foreach (file("input.txt") as $lineNumber => $line) {
    preg_match('/Game\s+(\d+)/', $line, $matches);
    $id = $matches[1];

    $sets = explode(";", $line);

    $minimumCubes = [
        'red' => 1,
        'green' => 1,
        'blue' => 1,
    ];

    foreach ($sets as $setIndex => $set) {
        $pattern = '/(\d+)\s+([a-zA-Z]+)/';
        preg_match_all($pattern, $set, $matches);

        $cubesArr = $matches[1];
        $colors = $matches[2];

        for ($i = 0; $i < count($colors); $i++) {
            $color = $colors[$i];
            $cubes = $cubesArr[$i];

            if ($cubes > $minimumCubes[$color]) {
                $minimumCubes[$color] = $cubes;
            }
        }
    }

    $power = $minimumCubes['red'] * $minimumCubes['green'] * $minimumCubes['blue'];
    $total += $power;
}

echo 'total is: ' . $total;
