<!DOCTYPE html>
<html>
<head>
    <title>Список сотрудников</title>
    <link rel="stylesheet" href="/pop-it-mvc/public/styles.css">
    <style>
        .users-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .users-table th, .users-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }

        .users-table th {
            background-color: #f2f2f2;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar-column {
            width: 70px;
        }
    </style>
</head>
<body>
<h1>Список сотрудников</h1>

<?php if ($users->isNotEmpty()): ?>
    <table class="users-table">
        <thead>
        <tr>
            <th class="avatar-column">Аватар</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Логин</th>
            <th>Роль</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php if ($user->avatar): ?>
                        <img src="<?= htmlspecialchars($user->avatar) ?>"
                             alt="Аватар <?= htmlspecialchars($user->last_name) ?>"
                             class="user-avatar">
                    <?php else: ?>
                        <img src="/public/images/default-avatar.jpg"
                             alt="Аватар по умолчанию"
                             class="user-avatar">
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($user->last_name) ?></td>
                <td><?= htmlspecialchars($user->first_name) ?></td>
                <td><?= htmlspecialchars($user->patronymic ?? '—') ?></td>
                <td><?= htmlspecialchars($user->login) ?></td>
                <td><?= htmlspecialchars($user->role) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-info">Сотрудники не найдены</div>
<?php endif; ?>
</body>
</html>