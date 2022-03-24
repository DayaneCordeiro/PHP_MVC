<?php

include  './../app/config.php';
include './../app/Libraries/Route.php';
include './../app/Libraries/Controller.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL ?>/public/css/styles.css" rel="stylesheet">
</head>
<body>
    <?php
    include '../app/Views/header.php';
    $routes = new Route();
    include '../app/Views/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= URL ?>/public/js/scripts.js"></script>
</body>
</html>