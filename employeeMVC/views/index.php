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
    /** @var \StandardFlow\Application\Entity\Employee[] $list */
    foreach ($allEmployee as $employee) { ?>
        <tr>
            <td><?= $employee->getId() ?></td>
            <td><?= $employee->getFirstName() ?></td>
            <td><?= $employee->getLastName() ?></td>
            <td><?= $employee->getBirth() ?></td>
            <td><?= $employee->getSalary() ?></td>
        </tr>

    <?php } ?>

</table>
<h2>Add a new employee:</h2>

<div class="box">
    <form method="POST" action="/add-employee">
        <b>First Name:</b> <input type="text" name="firstName" value="<?=$_SESSION['employee']['firstName'] ?? '' //{{ firstName }}?>">
        <span class="error">* <?php if (!empty($_SESSION['errors']['firstNameErr'])) {
                echo $_SESSION['errors']['firstNameErr'];
            } ?></span>
        <br><br>
        <b>Last Name:</b> <input type="text" name="lastName" value="<?= $_SESSION['employee']['lastName'] ?? '' ?>">
        <span class="error">* <?php if (!empty($_SESSION['errors']['lastNameErr'])) {
                echo $_SESSION['errors']['lastNameErr'];
            } ?></span>
        <br><br>
        <b>Date of Birth:</b> <input type="text" name="birth" value="<?= $_SESSION['employee']['birth'] ?? '' ?>">
        <span class="error">* <?php if (!empty($_SESSION['errors']['birthErr'])) {
                echo $_SESSION['errors']['birthErr'];
            } ?></span>
        <br><br>
        <b>Salary:</b> <input type="text" name="salary" value="<?= $_SESSION['employee']['salary'] ?? '' ?>">
        <span class="error">* <?php if (!empty($_SESSION['errors']['salaryErr'])) {
                echo $_SESSION['errors']['salaryErr'];
            } ?></span>
        <br><br>
        <input type="submit" name="submit" value="Add">
        <br><br>
    </form>
</div>

