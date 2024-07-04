<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
</head>
<?php 
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

$sql = "SELECT * from resturanttable";
$result = $conn->query($sql);

function dayli(){
    $sql = "SELECT * from resturanttable WHERE tarih < '2024-06-30'";
}
?>

<body>
        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 7%; margin-top: 5%;" class="glow-on-hover">Gün</Button>
        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover">Hafta</Button>
        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover">Ay</Button>

        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover" style="width: 40%;">Yıllık</Button>

        <br><br>

        <table border='1' style="text-align:center;">
        <thead>    <!--Table Head-->
            <th>Tarih</th>   <!--Table Heading-->
            <th>Sipareşler</th> 
            <th>Toplam turari</th> 
        </thead>
        <tbody>     <!--Table Body-->
        <?php 
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
    ?>
        </tbody>
        <tfooter>
        </tfooter>
    </table>
    
</body>



</html>