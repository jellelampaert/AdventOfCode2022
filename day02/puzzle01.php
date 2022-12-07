<?php

$content = file('input.txt');
$points = 0;

$losspoints = 0;
$drawpoints = 3;
$winpoints = 6;

foreach ($content as $move) {
    $shapes = explode(' ', trim($move));

    // Points for the move
    switch($shapes[1]) {
        case 'X': // Rock
            $points += 1;
            break;
        case 'Y': // Paper
            $points += 2;
            break;
        case 'Z': // Scissors
            $points += 3;
            break;
    }

    // Who is winning?
    switch ($shapes[0]) {
        case 'A': // Rock
            switch($shapes[1]) {
                case 'X': // Rock
                    $points += $drawpoints;
                    break;
                case 'Y': // Paper
                    $points += $winpoints;
                    break;
                case 'Z': // Scissors
                    $points += $losspoints;
                    break;
            }
            break;
        case 'B': // Paper
            switch($shapes[1]) {
                case 'X': // Rock
                    $points += $losspoints;
                    break;
                case 'Y': // Paper
                    $points += $drawpoints;
                    break;
                case 'Z': // Scissors
                    $points += $winpoints;
                    break;
            }
            break;
        case 'C': // Scissors
            switch($shapes[1]) {
                case 'X': // Rock
                    $points += $winpoints;
                    break;
                case 'Y': // Paper
                    $points += $losspoints;
                    break;
                case 'Z': // Scissors
                    $points += $drawpoints;
                    break;
            }
            break;
    }
}

echo $points;
echo "\r\n";