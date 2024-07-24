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
        <form action="" method="post" style="margin-left: 10%; margin-top:1%; font-size:25px;">

                Tarih: <input type="date" name="dateName"><br><br>

                <div class="divStyle">Alış: <input type="number" name="alisName" style="width: 30%;"> </div>

                <div class="divStyle">Satış: <input type="number" name="satisName" style="width: 30%;"><br><br></div>

                <Button type="sumbit" name='kaydet' id="kaydet" style="margin-left: -45%; margin-top: 5%;" 
                class="glow-on-hover" style="width: 40%;">Kaydet</Button>

                <Button type="sumbit" name='yenidenKaydet' id="yenidenKaydet" style="margin-left: 0%; margin-top: 5%;" class="glow-on-hover" style="width: 40%;">Yeniden Kaydet</Button>
       </form>
        <?php 
                function ControllerProfits($sql){
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "test1";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if($conn->connect_error){
                                die("Connection filed: ". $conn->connect_error);
                        }
                        /*$sql = "INSERT INTO profhistory(tarih,buys,sels,profit) VALUES('$tarih', '$harc', '$satis', '$kar')";*/
                        if($conn->query($sql) === TRUE) {echo '</br>Kayıt Başarılı';}
                        else{echo '</br> Error: '.$sql."<br>".$conn->error;
                        echo "</br> </br> </br>";
                        echo "Her Gün için Sadece bir kere veri ekleyebilirsiniz!";}
                }
                if($_POST['dateName'] != null && $_POST['alisName'] != null && $_POST['satisName'] != null){
                        $userInputDate = $_POST['dateName'];
                        $userBuys = intval($_POST['alisName']);
                        $userSels = intval($_POST['satisName']);
                        /*echo $userInputDate. "</br>";
                        echo $userBuys. "</br>";
                        echo $userSels. "</br>"; 
                        echo  $userSels - $userBuys;  */ 
                        $kar = $userSels - $userBuys;
                        ControllerProfits("INSERT INTO profhistory(tarih,buys,sels,profit) VALUES('$userInputDate', '$userBuys', '$userSels', '$kar')");
                }
                else{
                        echo "</br>Girilen Değerleri kontrol edin";
                }
        ?>
</body>
</html>