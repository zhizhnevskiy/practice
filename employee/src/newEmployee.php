<?php

require dirname(__DIR__) . $this->parameters['database'];

$ok = true;

if (empty($_POST["firstName"])) {
    $firstNameErr = "First Name is required";
    $ok = false;
} else {
    $firstName = $_POST["firstName"];
    if (!preg_match("/^[a-zа-я-' ]*$/iu", $firstName)) {
        $firstNameErr = "Only letters and white space allowed";
        $ok = false;
    }
}

if (empty($_POST["lastName"])) {
    $lastNameErr = "Last Name is required";
    $ok = false;
} else {
    $lastName = $_POST["lastName"];
    if (!preg_match("/^[a-zа-я-' ]*$/iu", $lastName)) {
        $lastNameErr = "Only letters and white space allowed";
        $ok = false;
    }
}

if (empty($_POST["birth"])) {
    $birthErr = "Date of Birth is required";
    $ok = false;
} else {
    $birth = $_POST["birth"];
    $birth = preg_replace("/[^0-9\.]/", "", $birth);
}

if (empty($_POST["salary"])) {
    $salaryErr = "Salary is required";
    $ok = false;
} else {
    $salary = $_POST["salary"];
    $salary = preg_replace("/[^0-9\.]/", "", $salary);
}

if ($ok) {
    $stmt = $connection->prepare("INSERT INTO employees (firstName, lastName, birth, salary) 
VALUES (:firstName, :lastName, :birth, :salary)");

    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':birth', $birth);
    $stmt->bindParam(':salary', $salary);

    $stmt->execute();
}
