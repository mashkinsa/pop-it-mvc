<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Pop it MVC</title>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header_inner">
            <nav class="menu">
                <a class="menu__list" href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
                <?php
                if (!app()->auth::check()):
                    ?>
                    <a class="menu__list" href="<?= app()->route->getUrl('/login') ?>">Вход</a>
                <?php
                else:
                    ?>
                    <a class="menu__list" href="<?= app()->route->getUrl('/logout') ?>">Выйти (<?= app()->auth::user()->name ?>)</a>
                <?php
                endif;
                ?>
            </nav>
        </div>
    </div>
</header>

<main>
    <div class="content">
        <?php
                if (!app()->auth::check()):
        ?>
        <?= $content ?? '' ?>
        <?php
        else:
        ?>
            <a class="content__list" href="<?= app()->route->getUrl('/add_staff') ?>">Добавить сотрудника</a>
            <a class="content__list" href="<?= app()->route->getUrl('/building') ?>">Добавить здание</a>
            <a class="content__list" href="<?= app()->route->getUrl('/room') ?>">Добавить помещение</a>
            <?= $content ?? '' ?>
        <?php
                endif;
        ?>
    </div>
</main>

</body>
</html>
