<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resutant Project</title>
        <link rel="stylesheet" href="style.css">
        
</head>
<body>
      <form action="connection.php" method="POST">
        <div class="yemeklerDiv" id="yemeklerDiv">
                <h3>Yemekler</h3>
                
                <label>Adana Kebab</label> <input type="number" value="0" min="0" id="adanaCount" name="adanaCount" style="margin-left: -10%;"><br><br>

                <label>Şiş Kebab</label> <input type="number" value="0" min="0" id="sisCount" name="sisCount" style="margin-left: -3%;"><br><br>

                <label>Tavuk pilav</label> <input type="number" value="0" min="0" id="tavukpilavCount" name="tavukpilavCount" style="margin-left: -6%;"><br><br>

                <label>Fasulye</label> <input type="number" value="0" min="0" id="fasuliyeCount" name="fasuliyeCount" style="margin-left: 2%;"><br><br>

                <label>Mercimek Çorbası</label> <input type="number" value="0" min="0" id="mercimekCount" name="mercimekCount" style="margin-left: -20%;"><br><br>

                <label>Tavuk Çorbası</label> <input type="number" value="0" min="0" id="tavukcorasiCount" name="tavukcorasiCount" style="margin-left: -12%;"><br><br>
        </div>
        <div class="icecekDiv" id="icecekDiv">
                <h3>İçecekler</h3>

                <label>Ayran</label> <input type="number" value="0" min="0" id="ayranCount" name="ayranCount" style="margin-left: -10%;"><br><br>
                
                <label>Kola</label> <input type="number" value="0" min="0" id="kolaCount" name="kolaCount" style="margin-left: -3%;"><br><br>

                <label>Soda</label> <input type="number" value="0" min="0" id="sodaCount" name="sodaCount" style="margin-left: -6%;"><br><br>

                <label>Su</label> <input type="number" value="0" min="0" id="suCount" name="suCount" style="margin-left: 2%;"><br><br>
        </div>
        <div class="digerDiv" id="digerDiv">
                <h3>Salata/Tatlı</h3>

                <label>Mevsin Salatası</label> <input type="number" value="0" min="0" id="adanaCount" style="margin-left: -10%;"><br><br>

                <label>Gün Salatası</label> <input type="number" value="0" min="0" id="sisCount" style="margin-left: -3%;"><br><br>

                <label>Sufle</label> <input type="number" value="0" min="0" id="tavukpilavCount" style="margin-left: -6%;"><br><br>

                <label>Sütlaç</label> <input type="number" value="0" min="0" id="fasuliyeCount" style="margin-left: 2%;"><br><br>
                
        </div>

        <Button type="sumbit" name='sumbit' id="sumbit" style="margin-left: 45%; margin-top: 10%;" class="btn btn-primary">Kaydet</Button>
        </form>
</body>
</html>