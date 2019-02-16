<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/../config/db.php";

function get_connection(){  // Получить соединение с БД
    static $connection = null;
    if(!$connection){
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    }
    return $connection;
}
function query($query){ // Получение данных из таблицы
    return mysqli_fetch_all(execute($query), MYSQLI_ASSOC);
}

function execute($query){ // Внесение изменений в БД
    return mysqli_query(get_connection(), $query);
}
