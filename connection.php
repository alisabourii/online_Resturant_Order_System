<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">

</head>
<body style="background-color: burlywood;">
        
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error) {
        die("". $conn -> connect_error);
}

$todayDate = date("d.m.y"); 
$toplamFiyat = 0;
$siparesler = "";

$adana = $_POST['adanaCount'];
if($adana != '0') {  
        $toplamFiyat +=   intval($adana) * 180; 
        $siparesler .= "Adana ".$adana."P";
        }

$sis = $_POST['sisCount'];
if($sis != '0') {  
        $toplamFiyat +=   intval($sis) * 200; 
        $siparesler .= ", Şiş ".$sis."P";
        }

$tavuk  = $_POST['tavukpilavCount'];
if($tavuk != '0') {  
        $toplamFiyat +=   intval($tavuk) * 140; 
        $siparesler .= ", Tavuk ".$tavuk."P";
        }

$fasuliye  = $_POST['fasuliyeCount'];
if($fasuliye != '0') {  
        $toplamFiyat +=   intval($fasuliye) * 100; 
        $siparesler .= ", Fasuliye ".$fasuliye."P";
        }


$mercimek   = $_POST['mercimekCount'];
if($fasuliye != '0') {  
        $toplamFiyat +=   intval($mercimek) * 80; 
        $siparesler .= ", Mercimek çorbası ".$mercimek."P";
        }

$tavukCorbasi    = $_POST['tavukcorasiCount'];
if($tavukCorbasi != '0') {  
        $toplamFiyat +=   intval($tavukCorbasi) * 90; 
        $siparesler .= ", Tavuk çorbası  ".$tavukCorbasi."P";
        }

$ayran    = $_POST['ayranCount'];
if($ayran != '0') {  
        $toplamFiyat +=   intval($ayran) * 20; 
        $siparesler .= ", Ayran  ".$ayran."P";
        }

        $kola    = $_POST['kolaCount'];
if($kola != '0') {  
        $toplamFiyat +=   intval($kola) * 20; 
        $siparesler .= ", Kola  ".$kola."P";
        }

$su    = $_POST['suCount'];
if($su != '0') {  
        $toplamFiyat +=   intval($su) * 15; 
        $siparesler .= ", Su  ".$su."P";
        }

$soda    = $_POST['sodaCount'];
if($soda != '0') {  
        $toplamFiyat +=   intval($soda) * 20; 
        $siparesler .= ", Soda  ".$soda."P";
        }

$mevsinsalata  = $_POST['mevsinCount'];
if($mevsinsalata != '0') {  
        $toplamFiyat +=   intval($mevsinsalata) * 50; 
        $siparesler .= ", Mevsin Salatası  ".$mevsinsalata."P";
        }

$gunsalatasi    = $_POST['gunSalataCount'];
if($gunsalatasi != '0') {  
        $toplamFiyat +=   intval($gunsalatasi) * 35; 
        $siparesler .= ", Gün Salatası  ".$gunsalatasi."P";
        }

$sufle    = $_POST['sufleCount'];
if($sufle != '0') {  
        $toplamFiyat +=   intval($sufle) * 50; 
        $siparesler .= ", Sufle  ".$sufle."P";
        }

$sutlac    = $_POST['sutlacCount'];
if($sutlac != '0') {  
        $toplamFiyat +=   intval($sutlac) * 50; 
        $siparesler .= ", Sütlaç  ".$sutlac."P";
        }

        //
if($siparesler != '' && $toplamFiyat != 0) {
        $sql = "INSERT INTO resturanttable(tarih, orders,totoalPrice) VALUE('$todayDate', '$siparesler', '$toplamFiyat')";
        echo "<div style='margin-left: 30%; margin-top: 10%; font-size:30px'>";
        if($conn->query($sql) === TRUE) {echo 'Kayıt Başarılı'; echo '<br><br>';}
        else{echo 'Error'.$sql."<br>".$conn->error;}

        echo "Sipareşler:  ".$siparesler; echo '<br><br>';
        echo "Toplam Fiyat:  ". $toplamFiyat; echo '<br><br>';

        echo '<form action="index.php" method="POST"> <button style="margin-left: 20%;">Sayfaya Dön</button> </form>';

        echo "</div>";
}

//Kaydetmeye göstermemeke ve sadece kaydetmek
/*if (!$currentuser) {
        header('location: index.php');
        exit;
     }
     $flags['noicons'] = true;
     $flags['noheader'] = true;
     $flags['nobody'] = true;*/