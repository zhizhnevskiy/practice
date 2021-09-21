<?php

namespace StandardFlow\Application\Controller;

use StandardFlow\Application;

class ControllerIndex extends ControllerBase
{

    public function index()
    {
        $employeeRepository = new Application\Repository\EmployeeRepository();

        $list = $employeeRepository->getAll();

        return $this->view->render('index', [
            'allEmployee' => $list,
        ]);
    }

    /**
     * Проверяет и принимает решение что делать дальше
     *
     * @return array|string
     */
    public function addEmployee()
    {
        $isValid = true;
        $errors = [];
        $employee = new Application\Entity\Employee();
        $employeeRepository = new Application\Repository\EmployeeRepository();

        if (empty($_POST["firstName"])) {
            $isValid = false;
            $errors['firstNameErr'] = 'First Name is required';
        } elseif (!preg_match("/^[a-zа-я-' ]*$/iu", $_POST["firstName"])) {
            $isValid = false;
            $errors['firstNameErr'] = "Only letters and white space allowed";
        }

        if (empty($_POST["lastName"])) {
            $isValid = false;
            $errors['lastNameErr'] = "Last Name is required";
        } elseif (!preg_match("/^[a-zа-я-' ]*$/iu", $_POST["lastName"])) {
            $isValid = false;
            $errors['lastNameErr'] = "Only letters and white space allowed";
        }

        if (empty($_POST["birth"])) {
            $isValid = false;
            $errors['birthErr'] = "Date of Birth is required";
        } elseif (!preg_match("/^(\d{1,2})\.(\d{1,2})(?:\.(\d{4}))?$/iu", $_POST["birth"])) {
            $isValid = false;
            $errors['birthErr'] = "Incorrect birthday date format";
        }

        if (empty($_POST["salary"])) {
            $isValid = false;
            $errors['salaryErr'] = "Salary is required";
        } elseif (!preg_match("/^[0-9]+$/iu", $_POST["salary"])) {
            $isValid = false;
            $errors['salaryErr'] = "Only numbers allowed";
        }

        $_SESSION['errors'] = [
            'firstNameErr' => $errors['firstNameErr'],
            'lastNameErr' => $errors['lastNameErr'],
            'birthErr' => $errors['birthErr'],
            'salaryErr' => $errors['salaryErr']
        ];

        $_SESSION['employee'] = [
            'firstName' => $_POST["firstName"],
            'lastName' => $_POST["lastName"],
            'birth' => $_POST["birth"],
            'salary' => $_POST["salary"]
        ];

        if ($isValid == true) {
            $employeeRepository->createEmployee($employee
                ->setFirstName($_POST["firstName"])
                ->setLastName($_POST["lastName"])
                ->setBirth($_POST["birth"])
                ->setSalary($_POST["salary"]));
        }

        header("Location: /");

        return '';
    }
}