<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
</head>
<?php 
        $userID =  $userPASS = "";
        if($_SERVER['REQUEST_METHOD'] == "POST"){
                $userID = inputRecorder($_POST["userID"]);
                $userPASS = inputRecorder($_POST["userPass"]);
        }

        function inputRecorder($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }
?>
<body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <img src="src/img/lock200.png" style="margin-left: 42%; margin-top: 5%;"><br>

                <div style="margin-left: 43%;">
                        <p style="margin-left: 4%;">Kullanıcı Adı:</p> <input type="text"  name="userID">
                        <p style="margin-left: 8%;">Şifre</p> <input type="text" id="userPass" name="userPass"><br>

                        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: -3%; margin-top: 5%;" class="glow-on-hover">Kaydet</Button>
                </div>
        </form>
</body>
</html>

<?php 
        function loginControl($userID){
                if($userID == "AliSbr" && $userID == "123456"){
                        echo "<script> location.href='/index.php'; </script>";
                        exit;
                }
                else{
                        echo "Hatalı Değer";
                }
        }
?>