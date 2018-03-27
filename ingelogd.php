<?php
/**
 * Created by PhpStorm.
 * User: armandojanssen
 * Date: 3/16/18
 * Time: 10:01 AM
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

<h1>Je bent ingelogd!</h1>

<button value="<?php session_destroy(); ?>">Loguit</button>

</body>
</html>
