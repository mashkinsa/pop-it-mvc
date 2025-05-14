<!DOCTYPE html>
<html>
<head>
    <title>Список помещений</title>
    <link rel="stylesheet" href="/pop-it-mvc/public/styles.css">
</head>
<body>
<h1>Список помещений</h1>

<div class="filter-form">
    <form method="get" action="">
        <div style="display: flex; align-items: center; justify-content: center;">
            <select name="room_type" class="form-control">
                <option value="">Все типы помещений</option>
                <?php foreach ($roomTypes as $type): ?>
                    <option value="<?= htmlspecialchars($type->name) ?>"
                        <?= $selectedType === $type->name ? 'selected' : '' ?>>
                        <?= htmlspecialchars($type->name) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn">Применить</button>
        </div>
    </form>
</div>

<?php if ($rooms->isNotEmpty()): ?>
    <table class="rooms-table">
        <thead>
        <tr>
            <th>№ помещения</th>
            <th>Тип</th>
            <th>Площадь (м²)</th>
            <th>Кол-во мест</th>
            <th>Здание</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= htmlspecialchars($room->number) ?></td>
                <td><?= htmlspecialchars($room->type->name ?? '—') ?></td>
                <td><?= $room->square ?></td>
                <td><?= $room->quantity ?? '—' ?></td>
                <td>
                    <?= htmlspecialchars($room->building->name ?? '—') ?>
                    <?php if (!empty($room->building->address)): ?>
                        <br><small><?= htmlspecialchars($room->building->address) ?></small>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-info">Нет данных о помещениях</div>
<?php endif; ?>
</body>
</html>