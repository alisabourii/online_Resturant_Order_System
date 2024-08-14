<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "test1"; 
  
// connect the database with the server 
$conn = new mysqli($servername,$username,$password,$dbname); 
  
 // if error occurs  
 if ($conn -> connect_errno) 
 { 
    echo "Failed to connect to MySQL: " . $conn -> connect_error; 
    exit(); 
 } 
 $adana = $_POST['adanaCount'];
 $sis = $_POST['sisCount'];
 $tavukPilav = $_POST['tavukpilavCount'];
 $fasuliye = $_POST['fasuliyeCount'];
 $mercimek = $_POST['mercimekCount'];
 $tavukCorba = $_POST['tavukcorasiCount'];
 $ayran = $_POST['ayranCount'];
 $kola = $_POST['kolaCount'];
 $soda = $_POST['sodaCount'];
 $su = $_POST['suCount'];
 $mevsimSalatasi = $_POST['mevsinCount'];
 $gunSalatasi = $_POST['gunSalataCount'];
 $sufle = $_POST['sufleCount'];
 $sutlc = $_POST['sutlacCount'];

 $sql = "UPDATE pricetable set 
                AdanaFiyat='$adana',
                SisFiyat='$sis',	
                TavukpFiyat='$tavukPilav',	
                FasulyeFiyat='$fasuliye',	
                MercimekFiyat='$mercimek',
                TavukCFiyat='$tavukCorba',
                AyranFiyat='$ayran',
                KolaFiyat='$kola',
                SodaFiyat='$soda',	
                SuFiyat	='$su',
                MevsinSFiyat='$mevsimSalatasi',	
                GunSFiyat='$gunSalatasi',
                SufleFiyat='$sufle',
                SutlacFiyat='$sutlc'
                 WHERE id=1";
if($conn->query($sql) === TRUE) {echo '<div style="margin-left: 30%; margin-top: 5%; font-size: 32px; color:white">Güncelleme  Başarılıle Tamamladnı</div>'; echo '<br><br>';}
else{echo 'Error: '.$sql."<br>".$conn->error;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
   <link rel="icon" type="image/x-icon" href="/src/img/ACEIcon.ico">

</head>
<body>
   <Button type="sumbit" onclick="location.href='fiyatBelirlemePaneli.php'" style="margin-left: 25%; margin-top: 10%;" class="glow-on-hover">Fiyat Belirle</Button>
   <Button type="sumbit" onclick="location.href='index.php'" style="margin-left: 20%; margin-top: 10%;" class="glow-on-hover">Ana Sayfa</Button>
</body>
</html>