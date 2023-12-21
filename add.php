<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $country = $_POST["country"];
    $age = $_POST["age"];
    $salary = $_POST["salary"];

    if (validateData(array("Ім'я" => $name, "Країна" => $country, "Вік" => $age, "Зарплата" => $salary))) {
        $newEmployee = array("Ім'я" => $name, "Країна" => $country, "Вік" => $age, "Зарплата" => $salary);
        header("Location: index.php");
        exit();
    } else {
        echo "Помилка: Невірні дані. Перевірте введені значення.";
    }
}
?>
