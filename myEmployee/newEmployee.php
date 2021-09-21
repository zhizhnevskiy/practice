<?php


$ok = true;

if (empty($_POST["firstName"])) {
    $firstNameErr = "First Name is required";
    $ok = false;
} else {
    $firstName = test_input($_POST["firstName"]);
    if (!preg_match("/^[a-zа-я-' ]*$/iu", $firstName)) {
        $firstNameErr = "Only letters and white space allowed";
        $ok = false;
    }
}

if (empty($_POST["lastName"])) {
    $lastNameErr = "Last Name is required";
    $ok = false;
} else {
    $lastName = test_input($_POST["lastName"]);
    if (!preg_match("/^[a-zа-я-' ]*$/iu", $lastName)) {
        $lastNameErr = "Only letters and white space allowed";
        $ok = false;
    }
}

if (empty($_POST["birth"])) {
    $birthErr = "Date of Birth is required";
    $ok = false;
} else {
    $birth = test_input($_POST["birth"]);
    $birth = preg_replace("/[^0-9\.]/", "", $birth);
}

if (empty($_POST["salary"])) {
    $salaryErr = "Salary is required";
    $ok = false;
} else {
    $salary = test_input($_POST["salary"]);
    $salary = preg_replace("/[^0-9\.]/", "", $salary);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($ok) {
    require_once "insertDB.php";
    require_once "selectDB.php";
} else {
    require_once "selectDB.php";
}
