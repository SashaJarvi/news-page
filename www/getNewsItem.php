<?php

use Lib\News\Constants;
use Lib\News\Database;

require_once('Lib/News/Constants.php');
require_once('Lib/News/Database.php');

$dpo = new Database();

//getting news item by id to show in view.php
if(isset($_GET['id'])) {
    $newsId = $_GET['id'];
}
$newsCont = $dpo->getNews($newsId);

//return to previous page
$back = $_SERVER['HTTP_REFERER'];