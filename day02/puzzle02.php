<?php

$content = file('input.txt');
$points = 0;

$losspoints = 0;
$drawpoints = 3;
$winpoints = 6;

$rockpoints = 1;
$paperpoints = 2;
$scissorpoints = 3;

foreach ($content as $move) {
    $shapes = explode(' ', trim($move));

    // What move do I need to make?
    switch ($shapes[0]) {
        case 'A': // Rock
            switch($shapes[1]) {
                case 'X': // I lose
                    $points += $losspoints;
                    $points += $scissorpoints;
                    break;
                case 'Y': // I draw
                    $points += $drawpoints;
                    $points += $rockpoints;
                    break;
                case 'Z': // I win
                    $points += $winpoints;
                    $points += $paperpoints;
                    break;
            }
            break;
        case 'B': // Paper
            switch($shapes[1]) {
                case 'X': // I lose
                    $points += $losspoints;
                    $points += $rockpoints;
                    break;
                case 'Y': // I draw
                    $points += $drawpoints;
                    $points += $paperpoints;
                    break;
                case 'Z': // I win
                    $points += $winpoints;
                    $points += $scissorpoints;
                    break;
            }
            break;
        case 'C': // Scissors
            switch($shapes[1]) {
                case 'X': // I lose
                    $points += $losspoints;
                    $points += $paperpoints;
                    break;
                case 'Y': // I draw
                    $points += $drawpoints;
                    $points += $scissorpoints;
                    break;
                case 'Z': // I win
                    $points += $winpoints;
                    $points += $rockpoints;
                    break;
            }
            break;
    }
}

echo $points;
echo "\r\n";