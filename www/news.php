<?php require_once('getData.php');
header('Content-Type: text/html; charset=utf-8');
;?>

<title>Новости</title>
<link rel='stylesheet' href='style.css'>

<div id='news-panel'>
    <h2>Новости</h2>
    <?php foreach ($newsList as $news): ?>
    <section class="news-block">
        <span class="news-date"><?=gmdate("d.m.y", $news['idate']);?></span>
        <a href="view.php?id=<?=$news['id'];?>" class="news-title"><?=$news['title'];?></a>
        <p class="news announce"><?=$news['announce'];?></p>
    </section>
    <?php endforeach; ?>
    <section class="pages">
        <h3>Страницы:</h3>
        <?php for ($page = 1; $page <= $number_of_pages; $page++): ?>
            <a class="page-number" href="news.php?page=<?=$page;?>"><?=$page;?></a>
        <?php endfor; ?>
    </section>
</div>