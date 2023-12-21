<?php
include 'functions.php';

$key = $_GET['key'];

if (isset($key) && is_numeric($key)) {
    $employee = $employees[$key];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $country = $_POST["country"];
        $age = $_POST["age"];
        $salary = $_POST["salary"];

        if (validateData(array("Ім'я" => $name, "Країна" => $country, "Вік" => $age, "Зарплата" => $salary))) {
            $employees[$key] = array("Ім'я" => $name, "Країна" => $country, "Вік" => $age, "Зарплата" => $salary);
            
            header("Location: index.php");
            exit();
        } else {
            echo "Помилка: Невірні дані. Перевірте введені значення.";
        }
    }

    echo "<form method='post' action='edit.php?key=$key'>
            Ім'я: <input type='text' name='name' value='{$employee["Ім'я"]}' required><br>
            Країна: <input type='text' name='country' value='{$employee["Країна"]}' required><br>
            Вік: <input type='number' name='age' value='{$employee["Вік"]}' required><br>
            Зарплата: <input type='number' name='salary' value='{$employee["Зарплата"]}' required><br>
            <input type='submit' value='Зберегти зміни'>
          </form>";
} else {
    echo "Помилка: Невірний ключ об'єкта для редагування.";
}
?>
