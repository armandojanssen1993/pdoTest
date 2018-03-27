<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
var_dump($_SESSION)

?>

<button value="<?php session_destroy(); ?>">Delete session</button>


</body>
</html>
