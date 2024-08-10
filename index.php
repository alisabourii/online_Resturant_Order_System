<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="formDiv">
                <form action="" method="post" style="margin-left: 10%; margin-top: 5%;">
                        <input type="text" name="deutschWort" placeholder="Deutsch Wort">
                        <input type="text" name="englihWord"  placeholder="Enlish Word">
                        <input type="text" name="turkceKelime" placeholder="Türkçe Kelime"><br><br>
                        <input type="text" name="comment" placeholder="comment" style="width: 49.5%;"><br><br>

                        <Button type="submit" name="saveSumbit" id="saveSumbit" style="margin: auto" class="glow-on-hover">Save</Button>
                </form>
        </div><br>

        <div class="formDiv">
                
                <form action="" method="post">
                        <div class="scrollDiv">
                                <table border='5' style="text-align:center;">
                                        <thead>
                                                <th>Deutsch</th>
                                                <th>English</th>
                                                <th>Türkçe</th>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                                $sqlC = new sqlController();
                                                $sqlC->showSql("SELECT * FROM `dictionarytable`"); 
                                        ?>
                                        </tbody>
                                </table>
                        </div>
                </form>
        </div>
        <?php
        class sqlController{
                function sqlQueryDone($sql){
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "dictionarydb";
        
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if($conn -> connect_error){
                         die("Fehler beim Herstellen einer Verbindung./Error to connect./Bağlantı hatası.");
                        }
                        if($conn ->query($sql) === True){
                                echo "</h2>Zum Speichern erledigt</h2>";
                        }
                        else{
                                echo '</br> Error: '.$sql."<br>".$conn->error."<br>";
                                echo "<h2>Kontrollieren Sie Ihre Eingaben</h2>";
                        }
                 }
                 function showSql($sql){
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "dictionarydb";
        
                        $conn = new mysqli($servername, $username, $password, $dbname); 
        
                        $result = $conn->query($sql);
                        echo "</br>";
                        if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                        echo "<tr>";
                                        echo "<td>".$row['deutsch'];
                                        echo "<td>".$row['english'];
                                        echo "<td>".$row['türkçe']."</br>";
                                }
                        }
                        else{
                                echo "Belirlediğiniz Tarihte Kar Kaydıdı bulunmamiş";
                                return 0;
                        }
        
                }
        }
        $sqlC = new sqlController();

        if(isset($_POST['saveSumbit'])){
                $todayDate = date('Y-m-d', time()); 
                $deWort = $_POST['deutschWort'];
                $enWord = $_POST['englihWord'];
                $trKelime = $_POST['turkceKelime'];
                $comment = $_POST['comment'];
                if($deWort != '' || $enWord != '' && $trKelime != ''){
                $sqlC->sqlQueryDone("INSERT INTO `dictionarytable` (`dates`, `deutsch`, `english`, `türkçe`,`comment`) VALUES ('$todayDate', '$deWort', '$enWord', '$trKelime','$comment');");
                }
                
        }
        else if(isset($_POST['listSumbit'])){
                header("Refresh:0");

        }
        else{
                echo "";
        }
        ?>
</body>

</html>