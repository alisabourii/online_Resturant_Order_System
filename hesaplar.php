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

$sql = "SELECT * from resturanttable WHERE tarih > '2024-07-01' ";
$result = $conn->query($sql);

echo"Sipareş ID-------Tarih ---------------------Sipareş -------------------------Toplam Fiyat";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>------" .$row["id"]. "------". $row["tarih"]. " " . $row["orders"] . $row["totoalPrice"]."<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

?>

<body>
        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 7%; margin-top: 10%;" class="glow-on-hover">Gün</Button>
        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover">Hafta</Button>
        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover">Ay</Button>

        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 4%; margin-top: 10%;" class="glow-on-hover" style="width: 40%;">Yıllık</Button>

</body>

<?php 

?>

</html>