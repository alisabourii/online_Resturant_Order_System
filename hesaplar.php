<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
</head>


<body>
    <Button  class="glow-on-hover" style="margin-left: 30%; width: 40%;" onclick="location.href='index.php'">Ana Sayfa</Button>
    <form action="" method="post" >
        <Button type="sumbit" name='sumbitGun' id="sumbitGun" style="margin-left: 7%;" class="glow-on-hover" onclick="<?php sqlHesapTable("SELECT * from resturanttable WHERE tarih > '2024-06-30'"); ?>">Gün</Button>

        <Button type="sumbit" name='sumbitHafta' id="sumbitHafta" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover" onclick="<?php sqlHesapTable("SELECT * from resturanttable"); ?>">Hafta</Button>

        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover">Ay</Button>

        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover" style="width: 40%;">Yıllık</Button>
    </form>
        <br><br>

        <table border='5' style="text-align:center;">
        <thead>    <!--Table Head-->
            <th>Tarih</th>   <!--Table Heading-->
            <th>Sipareşler</th> 
            <th>Toplam turari</th> 
        </thead>
        <tbody>     <!--Table Body-->
        <?php 
        function sqlHesapTable($sql){      
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

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["tarih"];
                    echo "<td>". $row["orders"];
                    echo "<td>". $row["totoalPrice"]."<br>"."<br>";
                }
            } else {
                echo "0 results";
            }
            echo"Tamam";
            $conn->close();
        }

        $todayDate = date('Y-m-d', time());
        if (isset($_POST['sumbitGun'])) {
            sqlHesapTable("SELECT * from resturanttable WHERE tarih > '2024-06-30'");
        }
        else if(isset($_POST["sumbitHafta"])) {
            sqlHesapTable("SELECT * from resturanttable");
        }
        ?>
        </tbody>
        <tfooter>
        </tfooter>
    </table>
    
</body>



</html>