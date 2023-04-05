<a href="/">Главная</a>
<a href="/?controller=security">Авторизации</a>
<a href="/?controller=second">Вторая</a>
<a href="/?controller=tasks">Задачи</a>
<a href="/?controller=guest">Гостевая</a><br>
<?php if ($username !== null) : ?>
    <p>Рады вас приветствовать, <?= $username ?>. <a href="?action=logout">[Выход]</a></p>
<?php else : ?>
    <form method="post">
        <input type="text" name="username" placeholder="Введите ваше имя"/>
        <input type="submit" value="Отправить"/>
    </form>
<?php endif ?><br>