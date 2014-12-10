<?
require_once __DIR__ . '/models/modelnews.php';

    // Записываем в переменную полученную id страницу <a href=controllers/controllernews.php?pagenews=<id> target="_blank">Читать далее...</a>
$pagenews_id  = (int)$_GET['pagenews'];
    // Помещаем в $get_page функцию, которая получает полученную id страницу
$get_page = Get_Page($pagenews_id);
if (false === $get_page)
redirect('404.php');
?>

<?php foreach ($get_page as $article): ?>
    <article>
        <h1><?=$article['title'];?></h1>
        <div><?=$article['text'];?></div>
        <div style="float: right; font-size: 12px; margin: 5px">Дата публикации <?=$article['datanews'];?></div>
    </article>
<?php endforeach; ?>

