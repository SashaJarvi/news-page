<?php
require_once('getNewsItem.php');
header('Content-Type: text/html; charset=utf-8');
?>

<title></title>
<link rel='stylesheet' href='style.css'>

<div id="news-text">
    <section class="news-full-text">
        <h2><?=$newsCont['title'];?></h2>
        <p class="news-content"><?=$newsCont['content'];?></p>
    </section>
    <div class="back-to-newslist"><a href="news.php?page=1">Все новости >></a></div>
</div>