<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 1:47
 */

namespace app\repositoryes;
use app\models\NewsModel;

class DataBaseRepository implements NewsRepositoryes
{

    private $connection;
    private $query;

    public function __construct($_connection)
    {
        $this->connection = $_connection;
    }

    public function getAllNews()
    {
        $this->getTheQueryResult();
        $this->processToQueryResult();
        $this->connection->closeConnect();
    }

    private function getTheQueryResult()
    {
        $this->query = mysqli_query($this->connection->getLinkToDataBase(),"SELECT * FROM site");
    }

    private function processToQueryResult()
    {
        while($row = mysqli_fetch_array($this->query))
        {
            echo $row['id'] . ' - ' . $row['title'] . '<br>';
        }
    }

}