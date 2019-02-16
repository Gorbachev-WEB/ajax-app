<!--Блок со списком стран-->
<div class="countries">
    <h2>Список стран:</h2>
    <ol>
        <?php
        if(is_array($countries)){ // При наличии массива формируем список
            foreach($countries as $country){
                echo "<li>$country</li>";
            }
        } else { // Или выводим стартовое сообщение
            echo "Пусто.";
        }
        ?>
    </ol>
    <span class="link">Обновить</span>
</div>

<!--Блок добавления страны-->
<div class="form">
    <h2>Добавление страны в список:</h2>
    <input type="text" placeholder="Введите страну">
    <span class="link">Добавить</span>
</div>

<!--Диалоговое окно-->
<div id="modal" title="Уведомление">
</div>
