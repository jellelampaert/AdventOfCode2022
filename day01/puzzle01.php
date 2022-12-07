<?php

$content = file('input.txt');

$calories = array();
$index = 0;

// Initialize first value
$calories[0] = 0;
foreach ($content as $line) {
    if (trim($line) == "") {
        $index++;
        $calories[$index] = 0;
    } else {
        $cals = (int)trim($line);
        $calories[$index] += $cals;
    }
}

rsort($calories);
echo $calories[0];
echo "\r\n";