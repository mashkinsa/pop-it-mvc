<!DOCTYPE html>
<html>
<head>
    <title>Подсчет посадочных мест</title>
    <link rel="stylesheet" href="/pop-it-mvc/public/styles.css">
</head>
<body>
<h1>Подсчет посадочных мест</h1>

<div class="filter-form">
    <form method="get" action="">
        <div style="display: flex; align-items: center; justify-content: center;">
            <select name="building" id="building-select" class="form-control">
                <option value="Главный корпус (Герцена 18)">Главный корпус (Герцена 18)</option>
                <option value="Подчиненный корпус (Ленина 1)">Подчиненный корпус (Ленина 1)</option>
            </select>
            <button type="button" id="apply-filter" class="btn">Применить</button>
        </div>
    </form>
</div>

<div id="total-seats" class="total-area-box">
    Общее количество выбранных мест: <span id="selected-seats">153</span>
    <p>Общее количество мест в здании: <span id="total-building-seats">168</span>
</div>

<table class="rooms-table">
    <thead>
    <tr>
        <th width="50px">
        </th>
        <th>№ помещения</th>
        <th>Тип</th>
        <th>Площадь (м²)</th>
        <th>Кол-во мест</th>
        <th>Здание</th>
    </tr>
    </thead>
    <tbody id="rooms-table-body">
    <tr>
        <td><input type="checkbox" class="room-checkbox" checked data-seats="30"></td>
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
        <td><input type="checkbox" class="room-checkbox" checked data-seats="123"></td>
        <td>123</td>
        <td>Актовый зал</td>
        <td>123</td>
        <td>123</td>
        <td>
            Главный корпус
            <br><small>Герцена 18</small>
        </td>
    </tr>
    <tr>
        <td><input type="checkbox" class="room-checkbox" data-seats="15"></td>
        <td>202</td>
        <td>Компьютерный класс</td>
        <td>40</td>
        <td>15</td>
        <td>
            Главный корпус
            <br><small>Герцена 18</small>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>