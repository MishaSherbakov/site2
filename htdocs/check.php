<?php
    $name = $_POST['name'];
    $surname = $_POST['surename']; 
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    
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

    // Используем подготовленные запросы для безопасного вставки данных
    $stmt = $mysqli->prepare("INSERT INTO `t1` (`name`, `surename`, `phone`, `email`, `date`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $surname, $phone, $email, $date);

    if ($stmt->execute()) {
        echo "Данные успешно добавлены в базу данных.";
    } else {
        echo "Ошибка при добавлении данных: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
?>