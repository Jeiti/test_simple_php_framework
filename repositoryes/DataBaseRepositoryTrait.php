<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 3:03
 */

namespace repositoryes;


trait DataBaseRepositoryTrait
{
    public function getTheQueryResult()
    {
        $this->query = mysqli_query($this->linkToDataBase,"SELECT * FROM site");
    }
}