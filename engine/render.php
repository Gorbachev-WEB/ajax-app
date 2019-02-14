<?php

function render_template($template, $params = []){ // Генерация шаблона с нужными параметрами
    ob_start();
    extract($params);
    include TEMPLATES_DIR . "/{$template}.php";
    return ob_get_clean();
}

function render($template, $params = [], $layout = null){ // Получение шаблона в лэйауте
    $content = render_template($template, $params);
    switch ($layout){
        case "main" :
            $content = render_template("layouts/main", ["content" => $content]);
            break;
    }
    return $content;
}
