<h2>Добавить здание</h2>
<h3><?= $message ?? ''; ?></h3>
<div class="form">
    <form method="post">
        <div class="cont">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label class="form_int">
                <input type="text" name="name" placeholder="Название здания" required>
            </label>
            <label class="form_int">
                <input type="text" name="address" placeholder="Адрес" required>
            </label>
            <button type="submit">Добавить</button>
        </div>
    </form>
</div>