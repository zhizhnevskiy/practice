<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Employee</title>
    <style>
        body {
            font-family: Calibri;
            text-align: center;
        }

        table {
            border: 3px grey outset;
            border-collapse: collapse;
            width: 500px;
            position: relative;
            left: calc(50% - 250px);
        }

        th,
        tfoot {
            background: #e3e3e3;
        }

        th,
        tr,
        td {
            border: 1px black solid;
            padding: 6px 10px;
        }

        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>

<?php

echo $this->renderView();

?>

</body>
</html>