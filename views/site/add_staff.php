<!DOCTYPE html>
<html>
<head>
    <title>Список сотрудников</title>
    <link rel="stylesheet" href="/pop-it-mvc/public/css/styles.css">
</head>
<body>
<h2>Добавить сотрудника</h2>

<!-- Вывод общего сообщения -->
<h3><?= $message ?? ''; ?></h3>

<!-- Вывод ошибок валидации -->
<?php if (isset($errors)): ?>
    <div class="error-messages">
        <?php foreach ($errors as $field => $fieldErrors): ?>
            <?php foreach ($fieldErrors as $error): ?>
                <div class="error"><?= $error ?></div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="form__room">
    <form method="post" enctype="multipart/form-data">
        <div class="cont__room">
            <!-- Основные поля -->
            <label class="form_int">
                <input type="text" name="last_name" placeholder="Фамилия"
                       value="<?= htmlspecialchars($request->last_name ?? '') ?>">
            </label>

            <label class="form_int">
                <input type="text" name="first_name" placeholder="Имя"
                       value="<?= htmlspecialchars($request->first_name ?? '') ?>">
            </label>

            <label class="form_int">
                <input type="text" name="patronymic" placeholder="Отчество"
                       value="<?= htmlspecialchars($request->patronymic ?? '') ?>">
            </label>

            <label class="form_int">
                <input type="text" name="login" placeholder="Логин"
                       value="<?= htmlspecialchars($request->login ?? '') ?>">
            </label>

            <label class="form_int">
                <input type="password" name="password" placeholder="Пароль">
            </label>

            <label class="form_int">
                <select name="role">
                    <option value="staff_dekanat" <?= ($request->role ?? '') == 'staff_dekanat' ? 'selected' : '' ?>>Сотрудник деканата</option>
                    <option value="admin" <?= ($request->role ?? '') == 'admin' ? 'selected' : '' ?>>Администратор</option>
                </select>
            </label>

            <!-- Поле для загрузки аватара -->
            <label class="form_int">
                <span>Аватар (JPEG/PNG, до 2MB)</span>
                <input type="file" name="avatar" accept="image/jpeg,image/png">
            </label>

            <button type="submit">Добавить</button>
        </div>
    </form>
</div>
</body>
</html>
