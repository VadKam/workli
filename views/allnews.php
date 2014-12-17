<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8">
</head>
<body>
<div id="maket">
    <div id="pagesnews">


        <?php foreach ($articles as $art): ?>
        <article>
            <h1><?=$art['title'];?></h1>
            <div><?=$art['text'];?><a href=news.php?pagenews=<?=$art['id'];?> target="_blank">Читать далее...</a></div>
            <div style="float: right; font-size: 12px; margin: 5px">Дата публикации <?=$art['datanews'];?></div>
            <div><a target="_blank" href=editpage.php?editnews=<?=$art['id'];?>">Редактировать Новость<?=$art['id'];?></a></div>
        </article>

        <?php endforeach;?>


    </div>
    <div id="knopkanews">
        <a target="_blank" href="views/addnews.php">Добавить Новость</a>
    </div>
</div>
</body>
</html>






