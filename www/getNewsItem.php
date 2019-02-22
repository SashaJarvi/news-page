<?php
require_once('config.php');

//getting news item by id to show in view.php
if(isset($_GET['id'])) {
    $newsId = $_GET['id'];
}

$getNews = $dbConn->query('SELECT title, content FROM news WHERE id = ' . $newsId);
$newsCont = $getNews->fetch();