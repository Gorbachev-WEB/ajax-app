<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/../config/main.php";
require_once ENGINE_DIR . "/db.php";

function countries_action($data = []){ // Взаимодействие со списком стран в БД
    $result = array();
    if(isset($data["country_name"])){ // Если передано значение, вносим его в БД
        $country_name = mysqli_real_escape_string(get_connection(), htmlspecialchars($data["country_name"]));
        if(execute("INSERT INTO country (name) value ('$country_name');")){
            return $result;
        }

    }
    else{
        if(is_array($countries = query("SELECT name from country;"))){ // Иначе, получаем массив стран из БД
            foreach ($countries as $country){
                $result[] = $country["name"];
            }
            return $result; // В случае успешного обращения к БД - возвращаем массив
        }
    };
    return mysqli_errno(get_connection()); // В случае ошибки - возвращаем её код
}
