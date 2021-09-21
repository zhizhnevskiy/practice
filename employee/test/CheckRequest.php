<?php

namespace StandardFlow\Application\Database;

class CheckRequest
{
    public bool $ok = true;

    public $firstName;
    public $lastName;
    public $birth;
    public $salary;

    public function firstName($firstName)
    {
        if (empty($firstName)) {
            $this->ok = false;
            return $firstNameErr = "First Name is required";
        } elseif (!preg_match("/^[a-zа-я-' ]*$/iu", $firstName)) {
            $this->ok = false;
            return $firstNameErr = "Only letters and white space allowed";
        }
        return $this->firstName = $firstName;
    }

    public function lastName($lastName)
    {
        if (empty($lastName)) {
            $this->ok = false;
            return $lastNameErr = "Last Name is required";
        } elseif (!preg_match("/^[a-zа-я-' ]*$/iu", $lastName)) {
            $this->ok = false;
            return $lastNameErr = "Only letters and white space allowed";
        }
        return $this->lastName = $lastName;
    }

    public function birth($birth)
    {
        if (empty($birth)) {
            $this->ok = false;
            return $birthErr = "Date of Birth is required";
        } else {
            $birth = preg_replace("/[^0-9\.]/", "", $birth);
        }
        return $this->birth = $birth;
    }

    public function salary($salary)
    {
        if (empty($salary)) {
            $this->ok = false;
            return $salaryErr = "Salary is required";
        } else {
            $salary = preg_replace("/[^0-9\.]/", "", $salary);
        }
        return $this->salary = $salary;
    }
}