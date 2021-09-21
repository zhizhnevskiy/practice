<?php
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$birth = $_POST["birth"];
$salary = $_POST["salary"];

$firstNameErr = $lastNameErr = $birthErr = $salaryErr = "";

//use Employee\Controller\ConnectionGet;

//require dirname(__DIR__) . $this->parameters['newEmployee'];

?>

<table>
    <caption>
        <h2>Company employees:</h2>
    </caption>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Salary</th>
    </tr>

    <?php

    $connection = new Employee\Controller\ConnectionGet();
    $connection->connection();
    $connection->getDB();

    foreach ($connection->data as $value1) {
        echo "<tr>";
        foreach ($value1 as $value2) {
            echo "<td>$value2</td>";
        }
        echo "</tr>";
    }

    function sum($array)
    {
        $result = 0;
        for ($i = 0; $i < count($array); $i++) {
            $result += $array[$i]['salary'];
        }
        return $result;
    }

    $sum = sum($connection->data);

    ?>

    <tfoot>
    <tr>
        <td colspan="4" style="text-align:right"><b>TOTAL:</b></td>
        <td><b><?php echo "$sum" ?></b></td>
    </tr>
    </tfoot>

</table>

<h2>Add a new employee:</h2>

<div class="box">
    <form method="POST" action="?">
        <b>First Name:</b> <input type="text" name="firstName" value="<?= $firstName ?>">
        <span class="error">* <?= $firstNameErr ?></span>
        <br><br>
        <b>Last Name:</b> <input type="text" name="lastName" value="<?= $lastName ?>">
        <span class="error">* <?= $lastNameErr ?></span>
        <br><br>
        <b>Date of Birth:</b> <input type="text" name="birth" value="<?= $birth ?>">
        <span class="error">* <?= $birthErr ?></span>
        <br><br>
        <b>Salary:</b> <input type="text" name="salary" value="<?= $salary ?>">
        <span class="error">* <?= $salaryErr ?></span>
        <br><br>
        <input type="submit" name="submit" value="Add">
        <br><br>
    </form>
</div>

</body>