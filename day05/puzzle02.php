<?php

$content = file('input.txt');

// Split starting grid and instructions
$startlayout = array();
$instructions = array();

$in_layout = true;

foreach($content as $line) {
    if (trim($line) == '') {
        $in_layout = false;
    } else {
        if ($in_layout) {
            $startlayout[] = $line;
        } else {
            $instructions[] = $line;
        }
    }
}

// Find the number of stacks.
$lastline = trim($startlayout[sizeof($startlayout) - 1]);
$number_of_stacks = substr($lastline, strrpos($lastline, ' ') + 1);

// Put the stacks in an array
$stacks = array();
for ($i = 0; $i < sizeof($startlayout) - 1; $i++) {
    for($j = 1; $j <= $number_of_stacks; $j++) {
        $char = substr($startlayout[$i], ($j - 1) * 4 + 1, 1);
        if (trim($char) != '') {
            $stacks[$j][] = $char;
        }
    }
}

// Process the instructions
foreach ($instructions as $instruction) {
    $instructionparts = explode(' ', trim($instruction));
    $containers = $instructionparts[1];
    $startingstack = $instructionparts[3];
    $endingstack = $instructionparts[5];
    
    $temparray = array();
    // Put the containers in a temporary array
    for ($i = 0; $i < $containers; $i++) {
        $temparray[] = array_shift($stacks[$startingstack]);
    }

    // Add the temporary array on top of the stack
    for ($i = 0; $i < $containers; $i++) {
        $char = array_pop($temparray);
        array_unshift($stacks[$endingstack], $char);
    }
}

for ($i = 1; $i <= $number_of_stacks; $i++) {
    echo array_shift($stacks[$i]);
}

echo "\r\n";