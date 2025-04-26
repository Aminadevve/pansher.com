<?php

$conn = pg_connect("host=127.0.0.1 dbname=pansher_site  user=postgres password=password");

if (!$conn) {

    die("Ошибка подключения: " . pg_last_error());

}

echo "Подключение к PostgreSQL успешно!";

pg_close($conn);

?>