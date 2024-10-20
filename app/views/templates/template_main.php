<!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?= $page?><?= TEXT_SITE_NAME?></title>
    </head>
    <body>
        <?php include_once VIEWS_COMMON_DIR . 'header.php'?>
        <main>
            <?php include_once VIEWS_PAGES_DIR . $page . '.php'?>
        </main>
        <?php include_once VIEWS_COMMON_DIR . 'footer.php'?>
    </body>
</html>