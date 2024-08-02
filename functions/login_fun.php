<?php
require_once('./conection.php');
session_start();
function signup($fname, $lname, $age, $country, $lavel, $phone, $password, $gender)
{
    global $con;
    $sql = "INSERT INTO users (fname,lname,age,country,lavel ,phone, password,gender) VALUES (:fname,:lname,:age,:country,:lavel ,:phone, :password,:gender)";
    $stmt = $con->prepare($sql);
    $data = [
        ':fname' => $fname,
        ':lname' => $lname,
        ':age' => $age,
        ':country' => $country,
        ':lavel' => $lavel,
        ':phone' => $phone,
        ':password' => md5($password),
        ':gender' => $gender

    ];
    $stmt->execute($data);
    echo "New user added successfully<br>";
    header('refresh:3 ,url=index.php');
    exit();
}
