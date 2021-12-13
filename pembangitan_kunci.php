<?php

echo "Membentuk kunci RSA";

//untuk membuat kunci yang lebih panjang coba gmp_random

//$rand1 = gmp_random(1); // mengeluarkan random number dari 0 sampai 1 x limb

//$rand2 = gmp_random(1); // mengeluarkan random number dari 0 sampai 1 x limb

//mencari bilangan random

$rand1=rand(100, 200);

$rand2=rand(100, 200);


// mencari bilangan prima selanjutnya dari $rand1 &rand2

$p = gmp_nextprime($rand1);
$q = gmp_nextprime($rand2);


//menghitung&menampilkan n=p*q
$n=gmp_mul($p, $q);
// $n=16799;


//menghitung&menampilkan totient/phi=(p-1)(q-1)
$totient=gmp_mul(gmp_sub($p, 1), gmp_sub($q, 1));
// $totient=16536;


//mencari e, dimana e merupakan coprime dari totient
//e dikatakan coprime dari totient jika gcd/fpb dari e dan totient/phi = 1

do {
    $rand3 = rand(100, 300);
    $e = gmp_nextprime($rand3);
    $gcd = gmp_gcd($e, $totient);
    if (gmp_strval($gcd)=='1') {
        break;
    }
} while (true);

// for ($e=2;$e<100;$e++) {  //mencoba perulangan max 100 kali,
//
//     $gcd = gmp_gcd($e, $totient);
//
//     if (gmp_strval($gcd)=='1') {
//         break;
//     }
// }
// $e = 7;
//cari d dengan syarat
// d.e mod totient =1
// d.e = totient*x + 1
// d.e = totient*1 + 1
// d = (totient *1 + 1)/e


//menghitung nilai d

$i=1;

do {
    $res = gmp_div_qr(gmp_add(gmp_mul($totient, $i), 1), $e);

    $i++;

    if ($i==10000) { //maksimal percobaan 10000

        break;
    }
} while (gmp_strval($res[1])!='0');

echo "<br>nilai i = ".$i=$i-1;
$d=$res[0];


$n =gmp_strval($n); //nilai n
$e =gmp_strval($e); //nilai e [enkripsi]
$d =gmp_strval($d); //nilai d [deskripsi]
echo "<br>nilai p = ".$p;
echo "<br>nilai q = ".$q;
echo "<br>nilai n = ".$n;
echo "<br>nilai e = ".$e;
echo "<br>nilai d = ".$d;
echo "<br>nilai totien n = ".$totient;
