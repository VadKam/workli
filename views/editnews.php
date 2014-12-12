<?php
/**
 * Created by PhpStorm.
 * User: Vad Kaminskiy
 * Date: 09.12.2014
 * Time: 16:29
 */
?>

<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8">
</head>
<body>
<div style="margin: 0 auto; max-width: 900px" id="addpagesnews">

        <form action="" name="" method="">
            <h3 style="text-align: center" >Измените заголовок</h3>
            <input type="text" style=" width: 100%; height: 30px; margin:0 25px;" name="title" value="<?=$edit_page['title'];?>">
            <h3 style="text-align: center">Измените текст</h3>
            <textarea name="text" style="resize: none; width: 100%; height: 350px; margin: 0 25px 25px;"><?=$edit_page['text'];?></textarea>
            <input  type="submit" value="Изменить">
        </form>

    <h1></h1>
    <div></div>

    <div>
</body>
</html>