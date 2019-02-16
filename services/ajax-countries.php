<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/../config/main.php";
require_once ENGINE_DIR . "/db.php";

function get_json($user_data){ // Получаем данные от пользователя, генерируем ответ
    $result = array();
    if(isset($user_data["country_name"])){ // Если в запросе передано значение, вносим его в БД
        $country_name = mysqli_real_escape_string(get_connection(), htmlspecialchars($user_data["country_name"]));
        if(execute("INSERT INTO country (name) value ('$country_name');")){
            return json_encode($result);
        }

    }
    else{
        if(is_array($countries = query("SELECT name from country;"))){ // Иначе, получаем массив стран из БД
            foreach ($countries as $country){
                $result[] = $country["name"];
            }
            return json_encode($result); // В случае успешного обращения к БД - возвращаем массив
        }
    };
    return json_encode(mysqli_errno(get_connection())); // В случае ошибки - возвращаем её код
}
