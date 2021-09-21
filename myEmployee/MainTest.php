<?php

$firstName = $lastName = $birth = $salary = "";
$firstNameErr = $lastNameErr = $birthErr = $salaryErr = "";
require_once "newEmployee.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employees</title>
    <link rel="stylesheet" href="../task01/public/style/style.css">
</head>

<body>

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

class MainTest{

}

    foreach ($data as $value1) {
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

    $sum = sum($data);

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

</html>