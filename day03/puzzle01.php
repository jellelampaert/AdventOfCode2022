<?php

$content = file('input.txt');

$sum = 0;

foreach($content as $line) {
    // Split the string in two
    $first_half = substr($line, 0, strlen($line) / 2);
    $second_half = substr($line, strlen($line) / 2);

    // Convert the two strings in a character-array
    $first_half_characters = str_split($first_half);
    $second_half_characters = str_split($second_half);

    // Check which characters is in both halves
    $samechar = '';
    foreach ($first_half_characters as $char) {
        if (in_array($char, $second_half_characters)) {
            // Charachter found
            $samechar = $char;
            break;
        }
    }

    if ($samechar != '') {
        $asciivalue = ord($samechar);
        $priority = 0;
        if ($asciivalue > 96) {
            // Lowercase
            $priority = $asciivalue - 96;
        } else {
            // Uppercase
            $priority = $asciivalue - 38;
        }
        $sum += $priority;
    }
}

echo $sum;
echo "\r\n";