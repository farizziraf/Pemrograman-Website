<?php
include "inc.php";
echo $angka;
echo "<br>";
if ($angka==100){
    echo "Memuaskan";
} else if ($angka<100&&$angka>=85){
    echo "Sangat Baik";
} else if ($angka<85&&$angka>=70){
    echo "Baik";
} else if ($angka<70&&$angka>=55){
    echo "Cukup";
} else if ($angka<55&&$angka>=0){
    echo "Kurang";
}