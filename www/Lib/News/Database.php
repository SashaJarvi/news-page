<?php

namespace Lib\News;

use PDO;

class Database
{

    private $db = null;

    function __construct()
    {
        $this->db = new PDO(
            "mysql:host=" . Constants::HOST .
            ";dbname=" . Constants::DBNAME .
            ";charset=" . Constants::CHARSET,
            Constants::USER,
            Constants::PASSWORD
        );
    }

    /**
     * @return PDO|null
     */
    public function getDb()
    {
        return $this->db;
    }

    public function getAllRows()
    {
        return $this->executeSql('*')->fetchAll();
    }

    public function getNewsList($resultStart, $resultsPerPage)
    {
        $newsListColumns = implode(", ", ['id', 'idate', 'title', 'announce']);
        return $this->executeSql($newsListColumns, 'news', '', "ORDER BY idate DESC LIMIT $resultStart , $resultsPerPage")->fetchAll();
    }

    public function getNews($newsId)
    {
        $newsColumns = implode(", ", ['title', 'content']);
        return $this->executeSql($newsColumns, 'news', "id = $newsId")->fetch();
    }

    private function executeSql($select, $from = 'news', $where = '', $params = '')
    {
        $query = "SELECT $select FROM $from";

        if (!empty($where)) {
            $query .= " WHERE $where";
        }

        if (!empty($params)) {
            $query .= " $params";
        }

        return $this->db->query($query);
    }
}