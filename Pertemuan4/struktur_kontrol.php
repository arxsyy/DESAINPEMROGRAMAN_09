<?php
$nilaiNumerik= 92;

if($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf : A";
}elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf : B"; 
}elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80){
    echo "Nilai huruf : C";
}elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf : D";
}
echo "<br>";
$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}

echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";
echo "<br>";

$jumlahLahan = 10;
$tanamanPerlahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($tanamanPerlahan * $buahPerTanaman);
}
echo "Jumlah buah yang akan dipanen adalah : $jumlahBuah";

echo "<br>";
$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}
echo "Total skor ujian adalah : $totalSkor";

echo "<br>";
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70,96];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak lulus) <br>";
        continue;
    }

    echo "Nilai : $nilai (Lulus) <br>";
}

$nilaiMtk = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
sort($nilaiMtk); 

$jumlahNilaiMtk = 0;
for ($i = 2; $i < (count($nilaiMtk) - 2); $i++) {
    $jumlahNilaiMtk += $nilaiMtk[$i]; 
}
$rataRata = $jumlahNilaiMtk / (count($nilaiMtk) - 4); 
echo "<br> Rata-rata nilai mtk = $rataRata";

echo "<br>";
$totalBayar = 120000;

if ($totalBayar > 100000){
    echo "<br>Selamat anda mendapatkan diskon 20% <br>";
    echo "Total belanja anda : $totalBayar <br>";
    echo "Total bayar : ". $totalBayar-($totalBayar*0.20). "<br>";
}else 
    echo "<br>Total bayar : $totalBayar";
?>