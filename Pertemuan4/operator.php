<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Nilai A: $a<br>";
echo "Nilai B: $b<br><br>";

echo "Hasil Penjumlahan: $a + $b = $hasilTambah<br>";
echo "Hasil Pengurangan: $a - $b = $hasilKurang<br>";
echo "Hasil Perkalian: $a * $b = $hasilKali<br>";
echo "Hasil Pembagian: $a / $b = $hasilBagi<br>";
echo "Sisa Bagi: $a % $b = $sisaBagi<br>";
echo "Hasil Pangkat: $a ** $b = $pangkat<br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<br>"; 
echo "Hasil Perbandingan:<br>";
echo "$a == $b: " . ($hasilSama ? 'Benar' : 'Salah') . "<br>";
echo "$a != $b: " . ($hasilTidakSama ? 'Benar' : 'Salah') . "<br>";
echo "$a < $b: " . ($hasilLebihKecil ? 'Benar' : 'Salah') . "<br>";
echo "$a > $b: " . ($hasilLebihBesar ? 'Benar' : 'Salah') . "<br>";
echo "$a <= $b: " . ($hasilLebihKecilSama ? 'Benar' : 'Salah') . "<br>";
echo "$a >= $b: " . ($hasilLebihBesarSama ? 'Benar' : 'Salah') . "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;
echo "<br>"; 
echo "Hasil Operasi Logika:<br>";
echo "$a && $b: " . ($hasilAnd ? 'Benar' : 'Salah') . "<br>";
echo "$a || $b: " . ($hasilOr ? 'Benar' : 'Salah') . "<br>";
echo "!$a: " . ($hasilNotA ? 'Benar' : 'Salah') . "<br>";
echo "!$b: " . ($hasilNotB ? 'Benar' : 'Salah') . "<br>";
echo "<br>";

$a += $b;
echo "Hasil += : $a<br>";
$a -= $b;
echo "Hasil -= : $a<br>";
$a *= $b;
echo "Hasil *= : $a<br>";
$a /= $b;
echo "Hasil /= : $a<br>";
$a %= $b;
echo "Hasil %= : $a<br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "$a === $b: " . ($hasilIdentik ? 'Benar' : 'Salah') . "<br>";
echo "$a !== $b: " . ($hasilTidakIdentik ? 'Benar' : 'Salah') . "<br>";
?>