<?php


require_once "connectionDB.php";

$stmt = $connection->prepare("INSERT INTO employees (firstName, lastName, birth, salary) 
VALUES (:firstName, :lastName, :birth, :salary)");
$stmt->bindParam(':firstName', $firstName);
$stmt->bindParam(':lastName', $lastName);
$stmt->bindParam(':birth', $birth);
$stmt->bindParam(':salary', $salary);

$stmt->execute();














//try {
//    $sql = 'CREATE DATABASE company_employees';
//    $connection->exec( $sql );
//    echo 'База данных создана <br>';
//} catch ( PDOException $e ) {
//    echo $sql . '<br>' . $e->getMessage(). '<br>';
//}

//try {
//    $sql1 = "CREATE TABLE employees(
//        id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        firstName VARCHAR(30) NOT NULL,
//        lastName VARCHAR(30) NOT NULL,
//        birth VARCHAR(50),
//        salary INT(9)
//        )";
//    $connection->exec( $sql1 );
//    echo 'Таблица employees создана успешно<br>';
//} catch ( PDOException $e ) {
//    echo $sql1 . '<br>' . $e->getMessage() . '<br>';
//}

//try {
//    $sql = 'INSERT INTO employees (firstName, lastName, birth, salary)
//VALUES ("$_POST[\'firstName\']", "$_POST[\'lastName\']", "$_POST[\'birth\']", "$_POST[\'salary\']")';
//    $connection->exec($sql);
//    $last_id = $connection->lastInsertId();
//    echo 'Новая запись успешно создана. последний ID: ' . $last_id . '<br>';
//} catch (PDOException $e) {
//    echo $sql . '<br>' . $e->getMessage() . '<br>';
//}

//try {
//    $connection->beginTransaction();
//    $connection->exec( "INSERT INTO myguests (firstName, lastName, email)
//    VALUES ('Yura', 'Zhizhnevskiy', 'zhizhnevskiy@yandex.ru')" );
//    $connection->exec( "INSERT INTO myguests (firstName, lastName, email)
//    VALUES ('Nadya', 'Zhizhnevskaya', 'zhizhnevskaya@yandex.ru')" );
//    $connection->exec( "INSERT INTO myguests (firstName, lastName, email)
//    VALUES ('Ilya', 'Zhizhnevskiy', 'zhizhnevskiy@yandex.ru')" );
//    $connection->commit();
//    echo 'Новые записи успешно созданы<br>';
//} catch ( PDOException $e ) {
//    $connection->rollback();
//    echo 'Ошибка: ' . $e->getMessage();
//}
//
//try {
//    $stmt = $connection->prepare( "INSERT INTO myguests (firstName, lastName, email)
//    VALUES (:firstName, :lastName, :email)" );
//    $stmt->bindparam( ':firstName', $firstName );
//    $stmt->bindparam( ':lastName', $lastName );
//    $stmt->bindparam( ':email', $email );
//    $firstName = 'ABC1';
//    $lastName = 'DEF1';
//    $email = 'ABC@def.com';
//    $stmt->execute();
//    $firstName = 'ABC2';
//    $lastName = 'DEF2';
//    $email = 'ABC@def.com';
//    $stmt->execute();
//    echo 'Новые подготовленные записи созданы успешно<br>';
//} catch ( PDOException $e ) {
//    echo 'Ошибка: ' . $e->getMessage();
//}
//
//try{
//    $sql3 = "DELETE FROM myguests WHERE id > 500";
//    $connection->exec($sql3);
//    echo "Записи успешно удалены<br>";
//}
//catch ( PDOException $e ) {
//    echo $sql3 . "<br>" . $e->getMessage();
//}
//
//try {
//    $sql4 ="UPDATE myguests SET lastname='Zhizhnevskiy' WHERE id > 1";
//    $stmt = $connection->prepare($sql4);
//    $stmt->execute();
//    echo $stmt->rowCount() . " записи ОБНОВЛЕНЫ успешно<br>";
//}
//catch(PDOException $e)
//{
//    echo $sql4 . "<br>" . $e->getMessage();
//}
//
//echo "<table style='border: solid 1px black;'>";
//echo '<tr><th>ID</th><th>Firstname</th><th>Lastname</th></tr>';
//class TableRows extends RecursiveIteratorIterator {
//    function __construct($it) {
//        parent::__construct($it, self::LEAVES_ONLY);
//    }
//    function current() {
//        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
//    }
//    function beginChildren() {
//        echo "<tr>";
//    }
//    function endChildren() {
//        echo "</tr>" . "\n";
//    }
//}
//try{
//     $stmt = $connection->prepare("SELECT id, firstName, lastName FROM
//     myguests WHERE id > 10 ORDER BY id DESC LIMIT 5 OFFSET 0");
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchALL())) as $k=>$v){
//         echo $v;
//     }
//}
//catch ( PDOException $e ) {
//    echo "Ошибка: " . $e->getMessage();
//}