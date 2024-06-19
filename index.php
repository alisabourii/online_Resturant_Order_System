<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resutant Project</title>
        <style>
                body{
                        background-color: cadetblue;
                }
                label{
                        margin-left: 4%;
                        margin-bottom: 2%;
                        margin-right: 30%;

                }
                input[type=number]{
                        width: 40px;
                        margin-right: 0%;
                        float: unset;
                        } 
                #yemeklerDiv{
                        float: left;
                        width: 25%;
                        border: 2px solid black;
                        border-radius: 10px;
                        padding: 1%;
                        background-color: antiquewhite;
                }
                #icecekDiv{
                        float: left;
                        width: 25%;
                        border: 2px solid black;
                        border-radius: 10px;
                        padding: 1%;
                        margin-left: 5%;
                        background-color: antiquewhite;
                }
        </style>
</head>
<body>
      <form action="connection.php">
        <div class="yemeklerDiv" id="yemeklerDiv">
                <h3>Yemekler</h3>
                <label>Adana Kebab</label> <input type="number" value="0" min="0" id="adanaCount" style="margin-left: -10%;"><br><br>
                <label>Şiş Kebab</label> <input type="number" value="0" min="0" id="sisCount" style="margin-left: -3%;"><br><br>

                <label>Tavuk pilav</label> <input type="number" value="0" min="0" id="tavukpilavCount" style="margin-left: -6%;"><br><br>
                <label>Fasulye</label> <input type="number" value="0" min="0" id="fasuliyeCount" style="margin-left: 2%;"><br><br>

                <label>Mercimek Çorbası</label> <input type="number" value="0" min="0" id="mercimekCount" style="margin-left: -20%;"><br><br>
                <label>Tavuk Çorbası</label> <input type="number" value="0" min="0" id="tavukcorasiCount" style="margin-left: -12%;"><br><br>
        </div>
        <div class="icecekDiv" id="icecekDiv">
                <h3>İçecekler</h3>
                <label>Adana Kebab</label> <input type="number" value="0" min="0" id="adanaCount" style="margin-left: -10%;"><br><br>
                <label>Şiş Kebab</label> <input type="number" value="0" min="0" id="sisCount" style="margin-left: -3%;"><br><br>

                <label>Tavuk pilav</label> <input type="number" value="0" min="0" id="tavukpilavCount" style="margin-left: -6%;"><br><br>
                <label>Fasulye</label> <input type="number" value="0" min="0" id="fasuliyeCount" style="margin-left: 2%;"><br><br>

                <label>Mercimek Çorbası</label> <input type="number" value="0" min="0" id="mercimekCount" style="margin-left: -20%;"><br><br>
                <label>Tavuk Çorbası</label> <input type="number" value="0" min="0" id="tavukcorasiCount" style="margin-left: -12%;"><br><br>
        </div>
        <div class="icecekDiv" id="icecekDiv">
                <h3>Salata/Tatlı</h3>
                <label>Adana Kebab</label> <input type="number" value="0" min="0" id="adanaCount" style="margin-left: -10%;"><br><br>
                <label>Şiş Kebab</label> <input type="number" value="0" min="0" id="sisCount" style="margin-left: -3%;"><br><br>

                <label>Tavuk pilav</label> <input type="number" value="0" min="0" id="tavukpilavCount" style="margin-left: -6%;"><br><br>
                <label>Fasulye</label> <input type="number" value="0" min="0" id="fasuliyeCount" style="margin-left: 2%;"><br><br>

                <label>Mercimek Çorbası</label> <input type="number" value="0" min="0" id="mercimekCount" style="margin-left: -20%;"><br><br>
                <label>Tavuk Çorbası</label> <input type="number" value="0" min="0" id="tavukcorasiCount" style="margin-left: -12%;"><br><br>
        </div>

        <Button type="sumbit" name='sumbit' id="sumbit">Kaydet</Button>
        </form>
</body>
</html>