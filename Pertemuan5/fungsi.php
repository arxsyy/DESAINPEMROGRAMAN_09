<?php

function perkenalan($nama, $salam = "Assalamualaikum"){
    echo $salam. ", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

perkenalan("Arsy", "Hallo");

echo "<hr>";

$saya = "Arsy";
$ucapanSalam = "Selamat pagi";

perkenalan($saya);

?>