<?php
require './connekt.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['books'])) {

    // SQL запрос
    $sql = "SELECT * FROM const";

    // Выполнение запроса и получение результатов
    $result = $mysqli->query($sql);

    // Проверяем наличие результатов и формируем JSON
    if ($result) {
        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row; // Сохраняем данные в массив
            }
            echo json_encode($data); // Возвращаем данные в формате JSON
            exit; // Завершаем выполнение скрипта после возврата JSON
        } else {
            http_response_code(400);
            echo json_encode(["error" => "No results"]);
            exit; // Завершаем выполнение скрипта после возврата JSON
        }
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Database error"]);
        exit; // Завершаем выполнение скрипта после возврата JSON
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
    exit; // Завершаем выполнение скрипта после возврата JSON
}