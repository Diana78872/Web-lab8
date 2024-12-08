<?php
// Отримання JSON-даних з локального файлу
$json = file_get_contents("data.json");

// Перевірка на помилку при отриманні даних
if ($json === false) {
    die("Не вдалося отримати дані з файлу.");
}

// Перетворення JSON у PHP-масив
$data = json_decode($json, true);

// Перевірка, чи JSON перетворився успішно
if ($data === null) {
    die("Помилка декодування JSON.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML-таблиця з даними</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Дані з API</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Affiliation</th>
                <th>Rank</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Виведення даних у таблицю
            foreach ($data as $person) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($person['name']) . "</td>";
                echo "<td>" . htmlspecialchars($person['affiliation']) . "</td>";
                echo "<td>" . htmlspecialchars($person['rank']) . "</td>";
                echo "<td>" . htmlspecialchars($person['location']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
