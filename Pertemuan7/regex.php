<?php

// percobaan 5.1
$pattern = '/[a-z]/'; // Cocokkan huruf kecil. 
$text = 'This is a Sample Text.';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!";
} else {
    echo "Tidak ada huruf kecil!";
}

// percobaan 5.2
$pattern = '/[0-9]+/'; // Cocokkan satu atau lebih digit.
$text = 'There are 123 apples.';

if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "";
} else {
    echo "Tidak ada yang cocok!";
}

// percobaan 5.3
$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text . ""; // Output: "I like banana pie."

// Percobaan 5.4
$pattern = '/go*d/'; //Cocokkan "god", "good", "goood", dll.
$text = 'god is good.';

if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "";
} else {
    echo "Tidak ada yang cocok!";
}
?>
