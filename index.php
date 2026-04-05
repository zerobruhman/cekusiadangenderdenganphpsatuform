<?php
$hasil = "";
var_dump($_GET);
function Cekusiagender($namatemp, $umurtemp, $gendertemp){
    $trimeednamatemp = trim($namatemp);
    if ($trimeednamatemp === ""){
        return "Nama harap di isi!";
    }
    if ($umurtemp === ""){
        return "Umur harap di isi";
    }
    if (!is_numeric($umurtemp)){
        return "Umur harap di isi dengan Angka!";
    }
    $namabersih = htmlspecialchars($trimeednamatemp);
    $umurbersih = (int)$umurtemp;

    if ($umurbersih < 0 || $umurbersih > 120){
        return "Umur tidak valid!";
    }
    switch (true){
        case $umurbersih <= 12:
            $usia = "Anak-Anak";
            break;
        case $umurbersih <= 17:
            $usia = "Remaja";
            break;
        case $umurbersih >= 18:
            $usia = "Dewasa";
            break;
    }
    switch ($gendertemp){
        case "L":
            $gender = "Laki-Laki";
            break;
        case "P":
            $gender = "Perempuan";
            break;
        default:
            return "Gender tidak valid!";
    }
    return "Halo  $namabersih, kamu $gender dan kamu $usia"; 
}
if (isset($_GET['nama']) && isset($_GET['umur'])){
    if (!isset($_GET['gender'])){
        $hasil = "Pilih gender dulu";
    }
    else {
        $hasil = Cekusiagender($_GET['nama'], $_GET['umur'], $_GET['gender']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="nama" placeholder="Masukkan nama">
        <input type="number" name="umur" placeholder="Masukkan umur">
        <input type="radio" name="gender" value="L"> Laki-Laki
        <input type="radio" name="gender" value="P"> Perempuan
        <button type="submit">Kirim</button>
    </form>
    <p><?php echo $hasil; ?></p>
</body>
</html>