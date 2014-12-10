<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
<div id="maket">
    <div id="pagesnews">


        <?php foreach ($get_page as $article): ?>
            <article>
                <h1><?=$article['title'];?></h1>
                <div><?=$article['text'];?></div>
                <div style="float: right; font-size: 12px; margin: 5px">Дата публикации <?=$article['datanews'];?></div>
            </article>
        <?php endforeach; ?>



    </div>
</div>
</body>
</html>