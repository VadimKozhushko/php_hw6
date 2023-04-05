<<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная страница</title>
</head>

<body>
  <h1><?= $pageHeader ?></h1>
  <?php if ($username !== null) : ?>
    <p>Привет, <?= $username ?></p>
    <a href="?action=logout">Выйти</a>
  <?php elseif (is_null($username)) : ?>
    <a href="?action=signin">Войти</a>
  <?php else : ?>
    <form method="post">
      <input type="text" name="username" placeholder="Введите ваше имя">
      <input type="password" name="password">
      <input type="submit" value="Отправить">
    </form>
  <?php endif ?>
</body>

</html>