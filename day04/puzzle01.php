<?php

$content = file('input.txt');

$count = 0;

foreach($content as $line) {
    $sections = explode(',', $line);
    $elf1 = explode('-', $sections[0]);
    $elf2 = explode('-', $sections[1]);

    $elf1min = $elf1[0];
    $elf1max = $elf1[1];
    $elf2min = $elf2[0];
    $elf2max = $elf2[1];

    if ($elf1min <= $elf2min && $elf1max >= $elf2max) {
        // Elf 2 is fully in elf 1
        $count++;
    } else if ($elf2min <= $elf1min && $elf2max >= $elf1max) {
        // Elf 1 is fully in elf 2
        $count++;
    }

}

echo $count;
echo "\r\n";