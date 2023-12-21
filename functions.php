<?php

function filterAndDisplay($array, $filterParams) {
    echo "<table border='1'>
        <tr>
            <th>Ім'я</th>
            <th>Країна</th>
            <th>Вік</th>
            <th>Зарплата</th>
            <th>Дії</th>
        </tr>";

    foreach ($array as $key => $item) {
        if (matchesFilter($item, $filterParams)) {
            echo "<tr>";
            echo "<td>" . $item["Ім'я"] . "</td>";
            echo "<td>" . $item["Країна"] . "</td>";
            echo "<td>" . $item["Вік"] . "</td>";
            echo "<td>" . $item["Зарплата"] . "</td>";
            echo "<td><a href='edit.php?key=$key'>Редагувати</a></td>";
            echo "</tr>";
        }
    }

    echo "</table>";
}


function matchesFilter($item, $filterParams) {
    foreach ($filterParams as $key => $value) {
        if (!empty($value) && $item[$key] != $value) {
            return false;
        }
    }
    return true;
}


function validateData($data) {

    if (empty($data["Ім'я"]) || empty($data["Країна"]) || $data["Вік"] < 0 || $data["Зарплата"] < 0) {
        return false;
    }
    return true;
}


function saveToFile($filename, $array) {
    $data = json_encode($array);
    file_put_contents($filename, $data);
}


function loadFromFile($filename) {
    if (file_exists($filename)) {
        $data = file_get_contents($filename);
        return json_decode($data, true);
    } else {
        return array();
    }
}

?>
