<?php

$content = file('input.txt');

$sum = 0;

for ($i = 0; $i < sizeof($content); $i += 3) {
    $line1 = str_split(trim($content[$i]));
    $line2 = str_split(trim($content[$i + 1]));
    $line3 = str_split(trim($content[$i + 2]));

    // Fill an array with the (unique) characters from the first line
    $chars_in_first_line = array();
    foreach ($line1 as $char) {
        if (!in_array($char, $chars_in_first_line)) {
            $chars_in_first_line[] = $char;
        }
    }

    // Check the second line for duplicate characters
    $chars_in_both_lines = array();
    foreach ($line2 as $char) {
        if (in_array($char, $chars_in_first_line)) { // Character was in the first array
            if (!in_array($char, $chars_in_both_lines)) { // Character is not yet in the second array
                $chars_in_both_lines[] = $char;
            }
        }
    }

    // Check the third line
    $char_in_three_lines = '';
    foreach ($line3 as $char) {
        if (in_array($char, $chars_in_both_lines)) {
            $char_in_three_lines = $char;
            break;
        }
    }

    // Calculate the priority using the ASCII-value
    $asciivalue = ord($char_in_three_lines);
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

echo $sum;
echo "\r\n";