<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 09.12.2014
 * Time: 16:28
 */
/*if (isset($_POST['text'])){
    header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
}*/
//require_once __DIR__ . '/../controllers/controllernews.php';
?>

<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8">
</head>
<body>
<div style="margin: 0 auto; max-width: 900px" id="addpagesnews">
    <form action="../controllers/controllernews.php" name="formaddnews" method="post">
        <h3 style="text-align: center">Введите заголовок</h3>
        <input type="text" style=" width: 100%; height: 30px; margin:0 25px;" name="title">
        <h3 style="text-align: center">Введите текст</h3>
        <textarea name="text" style="resize: none; width: 100%; height: 350px; margin: 0 25px 25px;"></textarea>
        <input  type="submit" value="Добавить">
    </form>
    <div>
</body>
</html>