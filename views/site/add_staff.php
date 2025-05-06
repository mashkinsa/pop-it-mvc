<h2>Добавить сотрудника</h2>
<h3><?= $message ?? ''; ?></h3>
<div class="form__room">
    <form method="post">
        <div class="cont__room">
            <label class="form_int">
                <input type="text" name="last_name" placeholder="Фамилия" required>
            </label>
            <label class="form_int">
                <input type="text" name="first_name" placeholder="Имя" required>
            </label>
            <label class="form_int">
                <input type="text" name="patronymic" placeholder="Отчество">
            </label>
            <label class="form_int">
                <input type="text" name="login" placeholder="Логин" required>
            </label>
            <label class="form_int">
                <input type="password" name="password" placeholder="Пароль" required>
            </label>
            <label class="form_int">
                <select name="role" required>
                    <option value="staff_dekanat" selected>Сотрудник деканата</option>
                    <option value="admin">Администратор</option>
                </select>
            </label>
            <button type="submit">Добавить</button>
        </div>
    </form>
</div>