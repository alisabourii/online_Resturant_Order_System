<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <style>
                label{
                        margin-left: 5%;
                        font-size: 20px;
                }
                input{
                        margin-right: 1%;
                }
                .divStyle{
                        width: 20%;
                        height: 10%;
                        float: left;
                }
        </style>
</head>
<body>
<Button onclick="myFunc()" style="margin-left: 10%; margin-top: 1%;" class="glow-on-hover" style="width: 40%;">Geri Git</Button>
        <form action="" method="post" style="margin-left: 10%; margin-top:1%; font-size:25px;">

                Tarih: <input type="date" name="dateName"><br><br>

                <div class="divStyle">Alış: <input type="number" name="alisName" style="width: 30%;"> </div>

                <div class="divStyle">Satış: <input type="number" name="satisName" style="width: 30%;"><br><br></div>

                <Button type="sumbit" name='kaydet' id="kaydet" style="margin-left: -45%; margin-top: 5%;" 
                class="glow-on-hover" style="width: 40%;">Kaydet</Button>

                <Button type="sumbit" name='yenidenKaydet' id="yenidenKaydet" style="margin-left: 0%; margin-top: 5%;" class="glow-on-hover" style="width: 40%;">Yeniden Kaydet</Button>

                <Button type="sumbit" name='bul' id="bul" style="margin-left: 0%; margin-top: 5%;" class="glow-on-hover" style="width: 40%;">Bul</Button>

                <Button type="sumbit" name='sil' id="sil" style="margin-left: 0%; margin-top: 5%;" class="glow-on-hover" style="width: 40%;">Sil</Button><br>

                <Button type="sumbit" name='karBul' id="karBul" style="margin-left: 0%; margin-top: 5%;" class="glow-on-hover" style="width: 40%;">Bilinmeyen kar</Button>

       </form>
       
        <?php 
               function totalSels($sql){      
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "test1";
    
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $result = $conn->query($sql);
                if($result->num_rows >0){
                    $row = $result->fetch_assoc();
                    $total = $row['Total'];
                    echo "<h1>Toplam: ". $total ."</h1>";
                }
                else{
                    echo "Sonuç Bulunmadı";
                }
            }
                function ControllerProfits($sql){
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "test1";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if($conn->connect_error){
                                die("Connection filed: ". $conn->connect_error);
                        }
                       
                        if($conn->query($sql) === TRUE) {
                                echo '</br>Kayıt Başarılı';}

                        else{echo '</br> Error: '.$sql."<br>".$conn->error;
                                echo "</br> </br> </br>";
                                echo "Her Gün için Sadece bir kere veri ekleyebilirsiniz!";}
                }

                function showSql($sql){
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "test1";
                        $conn = new mysqli($servername, $username, $password, $dbname); 

                        $result = $conn->query($sql);
                        echo "</br>";
                        if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                        echo "Belili olan Tarihin Kar miktari: ". $row['profit'] ."TL";
                                        return $row['profit'];
                                }
                        }
                        else{
                                echo "Belirlediğiniz Tarihte Kar Kaydıdı bulunmamiş";
                                return 0;
                        }

                }

                if(isset($_POST['kaydet'])){
                        $userInputDate = $_POST['dateName'];  $userBuys = intval($_POST['alisName']);
                        $userSels = intval($_POST['satisName']);  $kar = $userSels - $userBuys;
                        if($_POST['dateName'] != null && $_POST['alisName'] != null && $_POST['satisName'] != null){
                                ControllerProfits("INSERT INTO profhistory(tarih,buys,sels,profit) VALUES('$userInputDate', '$userBuys', '$userSels', '$kar')");
                        }
                        else{
                                echo "</br>Girilen Değerleri kontrol edin";
                        }
                }
                else if(isset($_POST['yenidenKaydet'])){
                        $userInputDate = $_POST['dateName'];    $userBuys = intval($_POST['alisName']);
                        $userSels = intval($_POST['satisName']);  $kar = $userSels - $userBuys;
                        if($_POST['dateName'] != null && $_POST['alisName'] != null && $_POST['satisName'] != null){
                                ControllerProfits("UPDATE profhistory SET buys='$userBuys',
                                  sels='$userSels' , 
                                 profit='$kar' 
                                 WHERE tarih = '$userInputDate'");
                        }
                        else{
                                echo "</br>Girilen Değerleri kontrol edin";
                        }
                }
                else if(isset($_POST['bul'])){
                        $userInputDate = $_POST['dateName'];
                        showSql("SELECT profit from profhistory WHERE tarih = '".($userInputDate)."'");
                }
                else if(isset($_POST['sil'])){
                        $userInputDate = $_POST['dateName'];
                        ControllerProfits("DELETE from profhistory WHERE tarih = '".($userInputDate)."'");
                }
                else if(isset($_POST['karBul'])){
                        function foundDate($command){
                                $date = new DateTime();
                                $lastMonth = $date->modify("".$command."");
                                $inputDate = $_POST['dateName'];
                                return $date->format('Y-m-d');
                                //return $inputDate;
                        }
                        
                        $trh = $_POST['dateName'];
                        totalSels("SELECT totoalPrice from resturanttable WHERE tarih > '.$trh.'");

                }
                
        ?>

        <script>
                function myFunc() {
            location.replace('hesaplar.php');
        }
        </script>
</body>
</html>