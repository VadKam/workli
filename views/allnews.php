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

        </article>

        <?php endforeach;?>


    </div>
    <div id="knopkanews">
        <a target="_blank" href="views/addnews.php">Добавить Новость</a>
    </div>
</div>
</body>
</html>






