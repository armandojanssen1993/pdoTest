<?php
/**
 * Created by PhpStorm.
 * User: armandojanssen
 * Date: 3/16/18
 * Time: 10:00 AM
 */

session_start();


$user = "root";
$pass = "root";

try {
    $conn = new PDO("mysql:host=localhost;dbname=test", $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$username = $_POST['username'];
$password = $_POST['password'];
$passhash = password_hash($password, PASSWORD_DEFAULT);
$test = false;

$selectUser = $conn->prepare("SELECT * FROM user");
$selectUser->execute();
$results = $selectUser->fetchAll(PDO::FETCH_OBJ);

//var_dump($results);

foreach ($results as $result){

    if ($username === $result->username && password_verify($password, $result->password)){
        echo "Je bent ingelogd";
        $_SESSION["inlog"] = true;
        $test = true;
        if ($result->role_id == 2){
            $_SESSION['admin'] = true;
        }

    }

}

if ($test === false){
    echo "Niet ingelogd";
}