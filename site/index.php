<?php
session_start();
date_default_timezone_set('Europe/Kyiv');

class Request
{
    public static function get(string $key, $default = null)
    {
        return isset($_GET[$key]) ? strip_tags($_GET[$key]) : $default;
    }

    public static function post(string $key, $default = null)
    {
        return isset($_POST[$key]) ? strip_tags($_POST[$key]) : $default;
    }

    public static function request(string $key, $default = null)
    {
        return isset($_REQUEST[$key]) ? strip_tags($_REQUEST[$key]) : $default;
    }
}

$backgroundColor = Request::request('color', '#FFE4B5');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $_SESSION['user_name'] = Request::post('username');;

    setcookie("last_login_time", date("H:i:s"), time() + 5);

    header("Location: index.php");
    exit;
}

if (Request::get('action') === 'logout') {
    session_destroy();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>PHP Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: <?= strip_tags($backgroundColor) ?>;
        }
    </style>
</head>

<body>
    <div class="user-form">
        <h2>Вітаю, <?= $_SESSION['user_name'] ?? 'студенте' ?>!</h2>
        <?php if (isset($_COOKIE['last_login_time'])): ?>
            <p>Ваш останній вхід був о: <?= $_COOKIE['last_login_time'] ?></p>
        <?php endif; ?>
        <hr>
        <form action="index.php" method="POST">
            Введіть ім'я: <input type="text" name="username" required />
            <button type="submit" name="login">Зберегти ім'я та час входу</button>
        </form>
        <hr>
        <p>Управління з GET:</p>
        <a href="index.php?action=logout">Вийти (Очистити сесію)</a>
        <a href="index.php?color=lightblue">Змінити фон (GET)</a>
        <hr>
        <h4>Збережені дані:</h4>
        <p>SESSION: <?php print_r($_SESSION); ?></p>
        <p>COOKIE: <?php print_r($_COOKIE); ?></p>
    </div>
</body>

</html>