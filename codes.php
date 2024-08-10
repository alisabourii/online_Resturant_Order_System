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

?>