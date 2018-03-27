<?php
////DB CONNECTION
//
$user = "root";
$pass = "root";
//
//$userlogintry = 'admin';
//
try {
    $conn = new PDO("mysql:host=localhost;dbname=test", $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$username = $_POST['username'];
$adress = $_POST['adress'];
$zipcode = $_POST['zipcode'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = 1;
//
$passhash = password_hash($password, PASSWORD_DEFAULT);

$checkUser = false;

$selectUser = $conn->prepare("SELECT * FROM user");
$selectUser->execute();
$results = $selectUser->fetchAll(PDO::FETCH_OBJ);

foreach ($results as $result) {
//    echo $result->username;
    if ($username === $result->username) {
        echo "Gebruikersnaam bestaat al";
        $checkUser = true;
    }
}

if ($checkUser === false) {
    $insertTest = $conn->prepare("INSERT INTO user (username, adress, zipcode, email, password, role_id) VALUES (:username, :adress, :zipcode, :email, :password, :role)");
    $insertTest->bindParam(':username', $username);
    $insertTest->bindParam(':adress', $adress);
    $insertTest->bindParam(':zipcode', $zipcode);
    $insertTest->bindParam(':email', $email);
    $insertTest->bindParam(':password', $passhash);
    $insertTest->bindParam(':role', $role);
    $insertTest->execute();
    echo "Gebruiker toegevoegd!";

}


//$usercheck = false;
//
////echo phpinfo();
////
////$insertTest = $conn->prepare("INSERT INTO user (username, adress, zipcode, email, password) VALUES (:username, :adress, :zipcode, :email, :password)");
////$insertTest->bindParam(':username', $username);
////$insertTest->bindParam(':adress', $adress);
////$insertTest->bindParam(':zipcode', $zipcode);
////$insertTest->bindParam(':email', $email);
////$insertTest->bindParam(':password', $passhash);
////$insertTest->execute();
//
////$insertTest = $conn->prepare("INSERT INTO user VALUES (:username, :adress, :zipcode, :email, :password)");
////$insertTest->execute(["username" => $username,
////    "adress" => $adress,
////    "zipcode" => $zipcode,
////    "email" => $email,
////    "password" => $passhash]);
////$insertTest = $conn->prepare("INSERT INTO user (username, adress, zipcode, email, password) VALUES (:username, :adress, :zipcode, :email, :password)");
////$insertTest->execute([":username" => $username,
////    ":adress" => $adress,
////    ":zipcode" => $zipcode,
////    ":email" => $email,
////    ":password" => $passhash]);
//
////$insertTest = $conn->prepare("INSERT INTO user ()")
//
//$selectTest = $conn->prepare("SELECT * FROM user");
//$selectTest->execute();
//$results = $selectTest->fetchAll(PDO::FETCH_OBJ);
//
//foreach ($results as $result) {
//    if ($username === $result->username && password_verify($password, $result->password)) {
////        echo "Gebruiker bestaat al! probeer opnieuw";
////        $usercheck = true;
//        session_start();
//    }
//}
////
////var_dump($result);
//
////var_dump(password_verify('admin', $result['password']));
//if ($username === $result['username'] && password_verify($password,$result["password"])){
////if ($passhash === $result['password']){
////    echo "YAY!";
////}else{
////    echo "NAY!";
////}
////
////if ($username === $result->username){
////    echo "Je username komt voor in de database -> ga door";
////}else{
////    echo "Username is niet gevonden in de database";
////}
////password_verify($password, $result->password)
////foreach ($results as $result) {
////    if ($username === $result->username) {
////        echo "Gebruiker bestaat al! probeer opnieuw";
////        $usercheck = true;
////    }
////    var_dump($result->password);
////    echo password_verify($result->password);
////}
////if ($usercheck === false) {
////    $insertTest = $conn->prepare("INSERT INTO user (username, adress, zipcode, email, password) VALUES (:username, :adress, :zipcode, :email, :password)");
////    $insertTest->bindParam(':username', $username);
////    $insertTest->bindParam(':adress', $adress);
////    $insertTest->bindParam(':zipcode', $zipcode);
////    $insertTest->bindParam(':email', $email);
////    $insertTest->bindParam(':password', $passhash);
////    $insertTest->execute();
////    echo "Gebruiker toegevoegd!";
////}
//
////SELECT
//
////$selectStudent = $conn->prepare("SELECT * FROM student");
////$selectStudent->execute();
////$results = $selectStudent->fetchAll(PDO::FETCH_OBJ);
////
//////var_dump($results);
////
////foreach ($results as $result){
////    echo $result->first_name;
////}
////INSERT
////$id = 7;
////$first_name = "JAN";
////$last_name = "JIEPERS";
////$email = "JANJIEPERS@gmail.com";
////$age = 15;
////$school_id = 1;
//
////$updateStudent = $conn->prepare("UPDATE student SET first_name = :first_name, last_name = :last_name, email = :email, age = :age, school_id = :school_id WHERE id = :id");
////$updateStudent->bindParam(':first_name', $first_name);
////$updateStudent->bindParam(':last_name', $last_name);
////$updateStudent->bindParam(':email', $email);
////$updateStudent->bindParam(':age', $age);
////$updateStudent->bindParam(':school_id', $school_id);
////$updateStudent->bindParam(':id', $id);
////$updateStudent->execute();
//
////$deleteStudent = $conn->prepare("DELETE FROM student WHERE id = :id");
////$deleteStudent->bindParam(':id', $id);
////$deleteStudent->execute();
//
//
////$insertStudent = $conn->prepare("INSERT INTO student (first_name, last_name, email, age, school_id) VALUES (:first_name, :last_name, :email, :age, :school_id)");
////$insertStudent->bindParam(':first_name', $first_name);
////$insertStudent->bindParam(':last_name', $last_name);
////$insertStudent->bindParam(':email', $email);
////$insertStudent->bindParam(':age', $age);
////$insertStudent->bindParam(':school_id', $school_id);
////$insertStudent->execute();
///
?>
