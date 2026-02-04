<?php
$link = mysqli_connect('localhost', 'root', '', 'muravey_db');

if (!$link) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

echo 'Подключение к базе успешно!';
