<?php

$content = file('input.txt');

$count = 0;

foreach($content as $line) {
    $sections = explode(',', $line);
    $elf1 = explode('-', $sections[0]);
    $elf2 = explode('-', $sections[1]);

    $has_overlap = false;

    // Put all sections of elf 1 in an array
    $elf1sections = array();
    for ($i = $elf1[0]; $i <= $elf1[1]; $i++) {
        $elf1sections[] = $i;
    }
    
    // Loop over elf 2's sections
    for ($i = $elf2[0]; $i <= $elf2[1]; $i++) {
        if (in_array($i, $elf1sections)) {
            $has_overlap = true;
        }
    }
    
    if ($has_overlap) {
        $count++;
    }
}

echo $count;
echo "\r\n";