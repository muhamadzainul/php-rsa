<?php

$hasil = "";
if (!empty($_POST['enkrip'])) {
    $n=$_POST['n'];
    $e=$_POST['e'];
    $teks=$_POST['teks'];
    //pesan dikodekan menjadi kode ascii, kemudian di enkripsi per karakter
    for ($i=0;$i<strlen($teks);++$i) {
        //rumus enkripsi <enkripsi>=<pesan>^<e>mod<n>
        $hasil.=gmp_strval(gmp_mod(gmp_pow(ord($teks[$i]), $e), $n));

        //antar tiap karakter dipisahkan dengan "."
        if ($i!=strlen($teks)-1) {
            $hasil.=".";
        }
    }
} else {
    $hasil = "";
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Enkripsi rsa</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <?php
        if ($hasil) {
            echo "<textarea id=\"hasil\">".$hasil."</textarea>";
        }
        ?>
        <form id="enkripsi" name="enkripsi" method="post">
           <textarea name="teks" id="teks"></textarea>
            <label for="n">n (desimal)=</label><input type="text" name="n" id="n" size="30" value="" />
            <label for="e">e (desimal)=</label><input type="text" name="e" id="e" size="10" value="" />
            <input type="submit" name="enkrip" id="enkrip" value="enkrip"/>
        </form>
</body>
</html>
