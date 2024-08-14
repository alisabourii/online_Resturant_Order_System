
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="/src/img/ACEIcon.ico">
</head>

<body>
        <form action="" method="post">
                <img src="src/img/lock200.png" style="margin-left: 42%; margin-top: 1%;"><br>

                <div style="margin-left: 43%;">
                        <h4 style="margin-left: 4%;"> Kullanıcı Adı:</h4> <input type="text"  name="userID" id="userID">
                        <h4 style="margin-left: 8%;">Şifre</h4> <input type="password" id="userPass" name="userPass" id="userPass"><br>

                        <Button type="sumbit" name='login' id="login" style="margin-left: -3%; margin-top: 5%;" class="glow-on-hover">Giriş</Button>
                </div>
        </form>
</body>
</html>

<?php 
        session_start();
        function loginControl($userID, $userPass){
                if($userID == "AliSbr" && $userPass== "12052006"){
                        echo "<script> location.href='/index.php'; </script>";
                        $_SESSION["userSatae"] = "root";
                        exit;

                }
                else if($userID == "Random1" && $userPass== "159753"){
                        echo "<script> location.href='/index.php'; </script>";
                        $_SESSION["userSatae"] = "worker";
                        exit;
                }
                else{
                        echo "Hatalı Giriş";
                }
        }
        if(isset($_POST['login'])){
                $id = $_POST['userID'];
                $pass = $_POST['userPass'];
                loginControl($id, $pass);
        }
        
?>