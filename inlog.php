<?php
/**
 * Created by PhpStorm.
 * User: armandojanssen
 * Date: 3/16/18
 * Time: 9:59 AM
 */
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

if (isset($_SESSION["inlog"])){
    echo "Je bent al ingelogd <br>";
    if (isset($_SESSION['admin'])){

        $user = "root";
        $pass = "root";

        try {
            $conn = new PDO("mysql:host=localhost;dbname=test", $user, $pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


        $selectUser = $conn->prepare("SELECT * FROM user");
        $selectUser->execute();
        $results = $selectUser->fetchAll(PDO::FETCH_OBJ);

        foreach ($results as $result) {
            echo $result->username . "<br>";
        }
        }
        ?>

    <form action="loguit.php" method="post">
        <input type="submit" value="Uitloggen">
    </form>

    <?php
}else{?>
<form action="check.php" method="post">
<label for="username">Username</label>
<input type="text" id="username" name="username">
<label for="password">password</label>
<input type="password" id="password" name="password">
<input type="submit">
</form>
<?php } ?>
</body>
</html>
