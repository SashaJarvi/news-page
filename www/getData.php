<?php
require_once('config.php');

//creating pagination
$results_per_page = 5;
$table_rows = $dbConn->query( "SELECT * FROM news");
$result = $table_rows->fetchAll();
$number_of_results = count($result);
$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;

//getting news from table
$stmt = $dbConn->query('SELECT id, idate, title, announce FROM news ORDER BY idate DESC LIMIT '
    . $this_page_first_result . ',' . $results_per_page);
$newsList = $stmt->fetchAll();