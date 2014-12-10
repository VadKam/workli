<html>
<head>
    <title>Новости</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
<div id="maket">
    <div id="pagesnews">


            <article>
                <h1><?=$get_page['title'];?></h1>
                <div><?=$get_page['text'];?></div>
                <div style="float: right; font-size: 12px; margin: 5px">Дата публикации <?=$get_page['datanews'];?></div>
            </article>

    <?
    var_dump($get_page);
        echo ($value["title"]);






    ?>
    </div>
</div>
</body>
</html>