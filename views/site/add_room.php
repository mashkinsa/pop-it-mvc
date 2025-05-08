<h2>Добавить помещение</h2>
<h3><?= $message ?? ''; ?></h3>

<div class="form__room">
    <form method="post">
        <label class="form_int">
            <input type="text" name="number" placeholder="Номер помещения" required>
        </label>
        <label class="form_int">
            <input type="number" step="0.1" name="square" placeholder="Площадь" required>
        </label>
        <label class="form_int">
            <input type="number" name="quantity" placeholder="Количество посадочных мест" required>
        </label>
        <label class="form_int">
            <select name="id_building" required>
                <option value="">-- Выберите здание --</option>
                <<?php foreach ($buildings as $building): ?>
                    <option value="<?= $building->id_building ?>"
                        <?= ($request->id_building ?? '') == $building->id_building ? 'selected' : '' ?>>
                        <?= htmlspecialchars($building->name) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <?php if (!empty($roomTypes)): ?>
            <label class="form_int">
                <select name="id_type" required>
                    <option value="">-- Выберите тип --</option>
                    <?php foreach ($roomTypes as $type): ?>
                        <option value="<?= $type->id_type ?>">
                            <?= $type->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
        <?php endif; ?>
        <button type="submit">Добавить</button>
    </form>
</div>