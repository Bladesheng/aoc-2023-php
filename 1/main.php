<?php

$total = 0;

foreach (file("input.txt") as $lineNumber => $line) {
    $firstNumber = null;
    $secondNumber = null;

    $characters = str_split($line);
    foreach ($characters as $character) {
        if (is_numeric($character)) {
            $firstNumber = $character;
            break;
        }
    }

    $charactersReversed = array_reverse($characters);
    foreach ($charactersReversed as $character) {
        if (is_numeric($character)) {
            $secondNumber = $character;
            break;
        }
    }

    $sum = $firstNumber . $secondNumber;
    $total += $sum;

    // echo $firstNumber;
    // echo $secondNumber;
    // echo "\n";
}

echo $total;
