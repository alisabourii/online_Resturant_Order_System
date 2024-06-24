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
  
    $sql = "select * from pricetable WHERE id='1'"; 
    $result = ($conn->query($sql)); 
    //declare array to store the data of database 
    $row = [];  
    
    if ($result->num_rows > 0)  
    { 
        // fetch all data from db into array  
        $row = $result->fetch_all(MYSQLI_ASSOC);   
    }  
    //Source for call from dataabse.
    //https://www.geeksforgeeks.org/how-to-retrieve-data-from-mysql-database-using-php/
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resutant Project</title>
        <link rel="stylesheet" href="style.css">
        
</head>
<body>
<h1 style="margin-left: 38%;">Fiyat Belirleme</h1>
      <form action="guncelle.php" method="POST">
        <div class="yemeklerDiv" id="yemeklerDiv">

                <h3>Yemekler</h3>
                
                <label>Adana Kebab</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['AdanaFiyat'];} ?>" min="0" id="adanaCount" name="adanaCount" style="margin-left: -10%;"><br><br>

                <label>Şiş Kebab</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['SisFiyat'];} ?>" min="0" id="sisCount" name="sisCount" style="margin-left: -3%;"><br><br>

                <label>Tavuk pilav</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['TavukpFiyat'];} ?>" min="0" id="tavukpilavCount" name="tavukpilavCount" style="margin-left: -6%;"><br><br>

                <label>Fasulye</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['FasulyeFiyat'];} ?>" min="0" id="fasuliyeCount" name="fasuliyeCount" style="margin-left: 2%;"><br><br>

                <label>Mercimek Çorbası</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['MercimekFiyat'];} ?>" min="0" id="mercimekCount" name="mercimekCount" style="margin-left: -20%;"><br><br>

                <label>Tavuk Çorbası</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['TavukCFiyat'];} ?>" min="0" id="tavukcorasiCount" name="tavukcorasiCount" style="margin-left: -12%;"><br><br>
        </div>
        <div class="icecekDiv" id="icecekDiv">
                <h3>İçecekler</h3>

                <label>Ayran</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['AyranFiyat'];} ?>" min="0" id="ayranCount" name="ayranCount" style="margin-left: 0%;"><br><br>
                
                <label>Kola</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['KolaFiyat'];} ?>" min="0" id="kolaCount" name="kolaCount" style="margin-left: 2%;"><br><br>

                <label>Soda</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['SodaFiyat'];} ?>" min="0" id="sodaCount" name="sodaCount" style="margin-left: 2%;"><br><br>

                <label>Su</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['SuFiyat'];} ?>" min="0" id="suCount" name="suCount" style="margin-left: 6%;"><br><br>
        </div>
        <div class="digerDiv" id="digerDiv">
                <h3>Salata/Tatlı</h3>

                <label>Mevsin Salatası</label> 
                <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['MevsinSFiyat'];} ?>" min="0" id="mevsinCount" name="mevsinCount" style="margin-left: -10%;"><br><br>

                <label>Gün Salatası</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['GunSFiyat'];} ?>" min="0" id="gunSalataCount" name="gunSalataCount" style="margin-left: -3%;"><br><br>

                <label>Sufle</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['SufleFiyat'];} ?>" min="0" id="sufleCount" name="sufleCount" style="margin-left: 12%;"><br><br>

                <label>Sütlaç</label> <input type="number" value="<?php if(!empty($row)) foreach($row as $rows){echo $rows['SutlacFiyat'];} ?>" min="0" id="sutlacCount" name="sutlacCount" style="margin-left: 10%;"><br><br>
                
        </div>

        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 20%; margin-top: 10%;" class="btn btn-primary">Güncelle</Button><br>
        </form>
        <Button onclick="location.href='index.php'" style="margin-left: 47%; margin-top: 3%;" class="btn btn-primary">Ana Sayfa</Button>
</body>
</html>
