<?php

use Lib\News\Constants;
use Lib\News\Database;

$dpo = new Database();

$dbConn = $dpo->getDb();

//creating pagination
$resultsPerPage = Constants::RESULTS_PER_PAGE;
$result = $dpo->getAllRows();
$numberOfResults = count($result);
$numberOfPages = ceil($numberOfResults / $resultsPerPage);

if (empty($page = $_GET['page']) || !is_numeric($page)) {
    $page = 1;
}

$resultStart = ($page - 1) * $resultsPerPage;

//getting news from table
$newsList = $dpo->getNewsList($resultStart, $resultsPerPage);