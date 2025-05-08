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
                <option value="Компьютерный класс">Компьютерный класс</option>
                <option value="Аудитория">Аудитория</option>
                <option value="Актовый зал">Актовый зал</option>
                <option value="Спортивный зал">Спортивный зал</option>
            </select>
            <button type="submit" class="btn">Применить</button>
        </div>
    </form>
</div>

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
    <tr>
        <td>401</td>
        <td>Компьютерный класс</td>
        <td>60</td>
        <td>30</td>
        <td>
            Главный корпус
            <br><small>Герцена 18</small>
        </td>
    </tr>
    <tr>
        <td>321</td>
        <td>Компьютерный класс</td>
        <td>321</td>
        <td>321</td>
        <td>
            Подчиненный корпус
            <br><small>Ленина 1</small>
        </td>
    </tr>
    <tr>
        <td>123</td>
        <td>Актовый зал</td>
        <td>123</td>
        <td>123</td>
        <td>
            Главный корпус
            <br><small>Герцена 18</small>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>