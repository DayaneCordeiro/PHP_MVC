<?php

include '../app/config.php';
include '../app/Libraries/Route.php';
include '../app/Libraries/Controller.php';
include '../app/Libraries/Connection.php';

$conn = new Connection;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=APP_NAME?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- End Bootstrap -->

    <link rel="stylesheet" href="<?=URL?>/public/css/styles.css">
</head>
<body>
    <?php
        include APP . '/Views/header.php';
        $routes = new Route();
        include APP . '/Views/footer.php';
    ?>
    <script src="<?=URL?>/public/js/scripts.js"></script>
</body>
</html>