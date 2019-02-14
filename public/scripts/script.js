$(document).ready(function(){
    $(".countries .link").click(function(){ // Получение списка стран через ajax
        $.post(
            "/",
            function(countries){ // В случае успеха принимаем массив
                let content = "";
                if(Array.isArray(countries)){
                    countries.forEach(function(country){
                        content += "<li>" + country + "</li>";
                    });
                    if(!content) content = "Пусто."; // Сообщение при пустом массиве
                    $(".countries ol").html(content);
                }
                else{ //сообщение об ошибке
                    $("#modal").text("Что-то пошло не так, попробуйте ещё раз! Код ошибки: " + countries).dialog({ modal: true });
                }
            },
            "json"
        );
    });
    $(".form .link").click(function(){ // Внесение страны в список
        $.post(
            "/",
            {country_name: $(".form input").val()}, // Передаем значение пользователя
            function(json){
                if(Array.isArray(json)){ // При успешной операции ожидаем массив
                    $("#modal").text("Элемент '" + $(".form input").val() + "' успешно добавлен в список").dialog({ modal: true });
                }
                else{ // Сообщение об ошибке
                    $("#modal").text("Что-то пошло не так, попробуйте ещё раз! Код ошибки: " + json).dialog({ modal: true });
                }
                $(".form input").val(""); // Очищаем поле в любом случае
            },
            "json"
        );
    })
});
