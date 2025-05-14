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
                <?php if (!app()->auth::check()): ?>
                    <a class="menu__list" href="<?= app()->route->getUrl('/login') ?>">Вход</a>
                <?php else: ?>
                    <a class="menu__list" href="<?= app()->route->getUrl('/logout') ?>">Выйти (<?= app()->auth::user()->name ?>)</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>

<main>
    <div class="content">
        <?php if (!app()->auth::check()): ?>
            <?= $content ?? '' ?>
        <?php else: ?>
            <?php if (app()->auth::user()->role === 'admin'): ?>
                <!-- Меню для администратора -->
                <a class="content__list" href="<?= app()->route->getUrl('/add_staff') ?>">Добавить сотрудника</a>
                <a class="content__list" href="<?= app()->route->getUrl('/staff') ?>">Список сотрудников</a>
            <?php elseif (app()->auth::user()->role === 'staff_dekanat'): ?>
                <!-- Меню для сотрудника деканата -->
                <a class="content__list" href="<?= app()->route->getUrl('/add_building') ?>">Добавить здание</a>
                <a class="content__list" href="<?= app()->route->getUrl('/add_room') ?>">Добавить помещение</a>
                <a class="content__list" href="<?= app()->route->getUrl('/choice') ?>">Выбор зданий по типу помещению</a>
                <a class="content__list" href="<?= app()->route->getUrl('/area') ?>">Подсчет площади помещений по зданиям</a>
                <a class="content__list" href="<?= app()->route->getUrl('/seats') ?>">Подсчет количества мест по зданиям</a>
            <?php endif; ?>

            <?= $content ?? '' ?>
        <?php endif; ?>
    </div>
</main>

</body>
</html>