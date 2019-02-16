<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/../config/main.php";
require_once ENGINE_DIR . "/render.php";
require_once SERVICES_DIR . "/countries-app.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo json_encode(countries_action($_POST)); // Выводин результат манипуляций с БД в json
    die();
};

echo render("task-countries", ["countries" => countries_action()], "main"); // Генерируем лэйаут со странами
