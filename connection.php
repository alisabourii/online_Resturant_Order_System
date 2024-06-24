<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">

</head>
<body style="background-color:darkcyan">
        
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

$sql = "select * from pricetable WHERE id='1'"; 
$result = ($conn->query($sql)); 
//declare array to store the data of database 
$row = [];  

if ($result->num_rows > 0)  
{ 
        // fetch all data from db into array  
        $row = $result->fetch_all(MYSQLI_ASSOC);   
} 

if(!empty($row)) 
foreach($row as $rows) 
        {  
        $todayDate = date('Y-m-d', time()); 
        $toplamFiyat = 0;
        $siparesler = "";

        $adana = $_POST['adanaCount'];
        if($adana != '0') {  
                $toplamFiyat +=   intval($adana) * $rows["AdanaFiyat"]; 
                $siparesler .= "Adana ".$adana."P";
                }

        $sis = $_POST['sisCount'];
        if($sis != '0') {  
                $toplamFiyat +=   intval($sis) * $rows["SisFiyat"]; 
                $siparesler .= ", Şiş ".$sis."P";
                }

        $tavuk  = $_POST['tavukpilavCount'];
        if($tavuk != '0') {  
                $toplamFiyat +=   intval($tavuk) * $rows["TavukpFiyat"]; 
                $siparesler .= ", Tavuk ".$tavuk."P";
                }

        $fasuliye  = $_POST['fasuliyeCount'];
        if($fasuliye != '0') {  
                $toplamFiyat +=   intval($fasuliye) * $rows["FasulyeFiyat"]; 
                $siparesler .= ", Fasuliye ".$fasuliye."P";
                }


        $mercimek   = $_POST['mercimekCount'];
        if($fasuliye != '0') {  
                $toplamFiyat +=   intval($mercimek) * $rows["MercimekFiyat"]; 
                $siparesler .= ", Mercimek çorbası ".$mercimek."P";
                }

        $tavukCorbasi    = $_POST['tavukcorasiCount'];
        if($tavukCorbasi != '0') {  
                $toplamFiyat +=   intval($tavukCorbasi) * $rows["TavukCFiyat"]; 
                $siparesler .= ", Tavuk çorbası  ".$tavukCorbasi."P";
                }

        $ayran    = $_POST['ayranCount'];
        if($ayran != '0') {  
                $toplamFiyat +=   intval($ayran) * $rows["AyranFiyat"]; 
                $siparesler .= ", Ayran  ".$ayran."P";
                }

                $kola    = $_POST['kolaCount'];
        if($kola != '0') {  
                $toplamFiyat +=   intval($kola) * $rows["KolaFiyat"]; 
                $siparesler .= ", Kola  ".$kola."P";
                }

        $su    = $_POST['suCount'];
        if($su != '0') {  
                $toplamFiyat +=   intval($su) * $rows["SuFiyat"]; 
                $siparesler .= ", Su  ".$su."P";
                }

        $soda    = $_POST['sodaCount'];
        if($soda != '0') {  
                $toplamFiyat +=   intval($soda) * $rows["SodaFiyat"]; 
                $siparesler .= ", Soda  ".$soda."P";
                }

        $mevsinsalata  = $_POST['mevsinCount'];
        if($mevsinsalata != '0') {  
                $toplamFiyat +=   intval($mevsinsalata) * $rows["MevsinSFiyat"]; 
                $siparesler .= ", Mevsin Salatası  ".$mevsinsalata."P";
                }

        $gunsalatasi    = $_POST['gunSalataCount'];
        if($gunsalatasi != '0') {  
                $toplamFiyat +=   intval($gunsalatasi) * $rows["GunSFiyat"]; 
                $siparesler .= ", Gün Salatası  ".$gunsalatasi."P";
                }

        $sufle    = $_POST['sufleCount'];
        if($sufle != '0') {  
                $toplamFiyat +=   intval($sufle) * $rows["SufleFiyat"]; 
                $siparesler .= ", Sufle  ".$sufle."P";
                }

        $sutlac    = $_POST['sutlacCount'];
        if($sutlac != '0') {  
                $toplamFiyat +=   intval($sutlac) * $rows["SutlacFiyat"]; 
                $siparesler .= ", Sütlaç  ".$sutlac."P";
                }

                //
        if($siparesler != '' && $toplamFiyat != 0) {
                $sql = "INSERT INTO resturanttable(tarih, orders,totoalPrice) VALUE('$todayDate', '$siparesler', '$toplamFiyat')";
                echo "Tarih :".$todayDate;
                echo "<div style='margin-left: 40%; margin-top: 10%; font-size:30px'>";
                if($conn->query($sql) === TRUE) {echo 'Kayıt Başarılı'; echo '<br><br>';}
                else{echo 'Error'.$sql."<br>".$conn->error;}
                echo "</div>";

                echo "<div style='margin-left: 10%; margin-top: 5%; font-size:30px' width: 40%;>";
                echo "Sipareşler:  ".$siparesler; echo '<br><br>';
                echo "</div>";

                echo "<div style='margin-left: 40%; margin-top: 3%; font-size:30px' >";
                echo "Toplam Fiyat:  ". $toplamFiyat; echo '<br><br>';
                echo "</div>";
        
                echo "<div style='margin-left: 30%; margin-top: 3%; font-size:30px'>";
                echo '<form action="index.php" method="POST"> <button style="margin-left: 20%;">Sayfaya Dön</button> </form>';
                echo "</div>";
        }
}

//Kaydetmeye göstermemeke ve sadece kaydetmek
/*if (!$currentuser) {
        header('location: index.php');
        exit;
     }
     $flags['noicons'] = true;
     $flags['noheader'] = true;
     $flags['nobody'] = true;*/