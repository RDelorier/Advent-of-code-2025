<?php

$input = trim(file_get_contents('input.csv'));
$lines = explode("\n", $input);

function getOffset(string $line)
{
    $dir = substr($line, 0, 1);
    $len = (int)substr($line, 1) % 100;

    return $dir == 'R' ? $len : -$len;
}

$position = 50;
$zeroCount = 0;

foreach ($lines as $line) {
    $diff = getOffset($line);
    $position = $position + $diff;

    if ($position < 0) {
        $position = abs(100 + $position);
    }

    $position %= 100;

    if ($position == 0) {
        $zeroCount++;
    }
}

echo "Answer: {$zeroCount}";