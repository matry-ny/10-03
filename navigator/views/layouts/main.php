<?php

/**
 * @var string $content
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contacts</title>

    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/sticky-footer.css" rel="stylesheet">
</head>

<body>

<!-- Begin page content -->
<main role="main" class="container">
    <a href="/user/logout" class="btn btn-danger">Logout</a>
    <?= $content ?>
</main>

<footer class="footer">
    <div class="container">
        <span class="text-muted">&copy; <?= date('Y') ?> 1003 PHP Academy</span>
    </div>
</footer>
</body>
</html>
