<?php

$total = 0;

$NUMBERS = [
    'one' => 1,
    'two' => 2,
    'three' => 3,
    'four' => 4,
    'five' => 5,
    'six' => 6,
    'seven' => 7,
    'eight' => 8,
    'nine' => 9,
];

foreach (file("input.txt") as $lineNumber => $line) {
    $firstNumber = null;
    $secondNumber = null;

    // looping left to right
    $characters = str_split($line);
    foreach ($characters as $i => $character) {
        $substring = substr($line, $i);

        foreach ($NUMBERS as $word => $number) {
            if (str_starts_with($substring, $word)) {
                $firstNumber = $number;
                break;
            }
        }

        if ($firstNumber !== null) {
            break;
        }

        if (is_numeric($character)) {
            $firstNumber = $character;
            break;
        }
    }

    // looping right to left
    $charactersreversed = array_reverse($characters);
    foreach ($charactersreversed as $i => $character) {
        $substring = substr($line, strlen($line) - $i);

        foreach ($NUMBERS as $word => $number) {
            if (str_starts_with($substring, $word)) {
                $secondNumber = $number;
                break;
            }
        }

        if ($secondNumber !== null) {
            break;
        }

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
