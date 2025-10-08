<?php

// percobaan 5.1
$pattern = '/[a-z]/'; // Cocokkan huruf kecil. 
$text = 'This is a Sample Text.';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!";
} else {
    echo "Tidak ada huruf kecil!";
}
?>
