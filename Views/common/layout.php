<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?? "No title" ?></title>
    </head>
    <body>
        <?php View::displayWithoutParams('common/header.php') ?>
        <?= $content['body'] ?? "No content" ?>
        <?php View::displayWithoutParams('common/footer.php') ?>
    </body>
</html>
