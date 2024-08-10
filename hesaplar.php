<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
</head>


<body>
    <Button  class="glow-on-hover" style="margin-left: 25%; width: 20%; float: left;" onclick="location.href='index.php'">Ana Sayfa</Button>
    <Button  class="glow-on-hover" style="margin-left: 5%; width: 20%;" onclick="location.href='profit.php'">Kâr</Button>
    <form action="" method="post" >
        <Button type="sumbit" name='sumbitGun' id="sumbitGun" style="margin-left: 7%;" class="glow-on-hover">Günlük</Button>

        <Button type="sumbit" name='sumbitHafta' id="sumbitHafta" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover">Haftalık</Button>

        <Button type="sumbit" name='sumbitAy' id="sumbitAy" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover">Aylık</Button>

        <Button type="sumbit" name='sumbitYil' id="sumbitYil" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover" style="width: 40%;">Yıllık</Button>
    </form>
        <br><br>
    <div class="scrollDiv">
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
                $conn->close();
            }
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
                    echo "<h3>Toplam: ". $total ."</h3>";
                }
                else{
                    echo "Sonuç Bulunmadı";
                }
            }

            $todayDate = date('Y-m-d', time());
            $lastmonth ="2024-06-30";

            function foundDate($command){
            $date = new DateTime();
            $lastMonth = $date->modify("".$command."");
            return $date->format('Y-m-d');
            }

            $totalStatus = 0;

            if (isset($_POST['sumbitGun'])) {
                sqlHesapTable("SELECT * from resturanttable WHERE tarih > '".(foundDate("-1 day"))."'");            
                $totalStatus =1; 
            }
            else if(isset($_POST["sumbitHafta"])) {
                sqlHesapTable("SELECT * from resturanttable WHERE tarih > '".(foundDate("-7 day"))."'");
                $totalStatus =2; 
            } 
            else if(isset($_POST["sumbitAy"])) {
                sqlHesapTable("SELECT * from resturanttable WHERE tarih > '".(foundDate("last month"))."'");
                $totalStatus =3; 
            }
            else if(isset($_POST["sumbitYil"])) {
                sqlHesapTable("SELECT * from resturanttable WHERE tarih > '".(foundDate("last year"))."'");
                $totalStatus =4; 
            }
            ?>

            </tbody>
            <tfooter>
            </tfooter>
        </table>
    </div>
    <?php
        if($totalStatus == 1)
            totalSels("SELECT SUM(totoalPrice) as Total from resturanttable WHERE tarih > '".(foundDate("-1 day"))."'");
        else if($totalStatus == 2)
            totalSels("SELECT SUM(totoalPrice) as Total from resturanttable WHERE tarih > '".(foundDate("-7 day"))."'");
        else if($totalStatus == 3)
            totalSels("SELECT SUM(totoalPrice) as Total from resturanttable WHERE tarih > '".(foundDate("last month"))."'");
        else if($totalStatus == 4)
            totalSels("SELECT SUM(totoalPrice) as Total from resturanttable WHERE tarih > '".(foundDate("last year"))."'");

    ?>
</body>



</html>