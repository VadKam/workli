<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8">
</head>
<body>
<div id="maket">
    <div id="pagesnews">

        <?php foreach ($view->articles as $article): ?>
            <article>
                <h1><?=$article['title'];?></h1>
                <div><?=$article['text'];?><a href=news.php?pagenews=<?=$article['id'];?> target="_blank">Читать далее...</a></div>
                <div style="float: right; font-size: 12px; margin: 5px">Дата публикации <?=$article['datanews'];?></div>
                <div><a target="_blank" href=editpage.php?editnews=<?=$article['id'];?>">Редактировать Новость<?=$article['id'];?></a></div>
            </article>
        <?php endforeach; ?>

    </div>
    <div id="knopkanews">
        <a target="_blank" href="views/addnews.php">Добавиить Новость</a>
    </div>
</div>
</body>
</html>
