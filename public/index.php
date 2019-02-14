<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/../config/main.php";
require_once ENGINE_DIR . "/render.php";
require_once SERVICES_DIR . "/ajax-countries.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo get_json($_POST);
    die();
};

echo render("task-countries", [], "main");
