<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body bgcolor="FBB9170">
        <div>
                <h1>Register Form</h1>
                <form action="connect.php" method="POST">
                        <label for="user">Name:</label><br>
                        <input type="text" name='name' id='name' required><br><br>

                        <label for="email">Email:</label><br>
                        <input type="text" name='email' id='email' required><br><br>

                        <label for="phone">Phone:</label><br>
                        <input type="text" name='phone' id='phone' required><br><br>

                        <label for="bgroup">Blood Grup:</label><br>
                        <input type="text" name='bgroup' id='bgroup' required><br><br>

                        <Button type="sumbit" name='sumbit' id="sumbit">Sumbit</Button>
                </form>
        </div>
</body>
</html>