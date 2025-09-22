<?php

$totalKursi = 45;
$kursiDitempati = 28;
$kursiKosong = $totalKursi - $kursiDitempati;
$persentaseKursiKosong = ($kursiKosong / $totalKursi) * 100;

echo "Jumlah kursi kosong: $kursiKosong dari $totalKursi <br>";
echo "Persentase kursi kosong: $persentaseKursiKosong %<br>";
?>
