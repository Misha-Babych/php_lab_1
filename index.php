<?php
include 'functions.php';

$employees = array(
    array("Ім'я" => "Іван", "Країна" => "Україна", "Вік" => 30, "Зарплата" => 5000),
);

echo "<table border='1'>
        <tr>
            <th>Ім'я</th>
            <th>Країна</th>
            <th>Вік</th>
            <th>Зарплата</th>
            <th>Дії</th>
        </tr>";

foreach ($employees as $key => $employee) {
    echo "<tr>";
    echo "<td>" . $employee["Ім'я"] . "</td>";
    echo "<td>" . $employee["Країна"] . "</td>";
    echo "<td>" . $employee["Вік"] . "</td>";
    echo "<td>" . $employee["Зарплата"] . "</td>";
    echo "<td><a href='edit.php?key=$key'>Редагувати</a></td>";
    echo "</tr>";
}

echo "</table>";

echo "<form method='post' action='add.php'>
        Ім'я: <input type='text' name='name' required><br>
        Країна: <input type='text' name='country' required><br>
        Вік: <input type='number' name='age' required><br>
        Зарплата: <input type='number' name='salary' required><br>
        <input type='submit' value='Додати'>
      </form>";
?>
