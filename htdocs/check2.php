<?php
    $name = $_POST['name'];
    $age = $_POST['age'];
    $flight_experience = $_POST['flight_experience'];
    $aircraft_type = isset($_POST['aircraft_type']) ? implode(", ", $_POST['aircraft_type']) : "";
    $comments = $_POST['comments'];
    $flight_date = $_POST['flight_date'];
    $password = $_POST['password'];
    $hidden_field = $_POST['hidden_field'];

    $db_host = 'localhost';
    $db_user = 'a0881422_hw';
    $db_password = '567490AZAZaz';
    $db_db = 'a0881422_hw';


    $mysqli = new mysqli(
        $db_host,
        $db_user,
        $db_password,
        $db_db
    );

    if ($mysqli->connect_error) {
        die('Ошибка подключения: ' . $mysqli->connect_error);
    }

    // Подготовка SQL-запроса для вставки данных в таблицу t2
    $sql = "INSERT INTO t2 (name, age, flight_experience, aircraft_type, comments, flight_date, password, hidden_field) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Подготовка SQL-запроса
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt === false) {
        die('Ошибка подготовки запроса: ' . $mysqli->error);
    }

    // Привязываем параметры к значениям переменных
    $stmt->bind_param("sissssss", $name, $age, $flight_experience, $aircraft_type, $comments, $flight_date, $password, $hidden_field);
    
    // Выполняем SQL-запрос
    if ($stmt->execute()) {
        echo "Данные успешно добавлены в таблицу t2.";
    } else {
        echo "Ошибка при добавлении данных: " . $stmt->error;
    }

    // Закрываем подготовленное выражение
    $stmt->close();
    
    // Закрываем соединение с базой данных
    $mysqli->close();
?>