<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 1:32
 */

namespace app\models;

use framework\Model;
use app\repositoryes\DataBaseRepositoryTraitWithQueryResult;


class NewsModel extends Model
{
    use DataBaseRepositoryTraitWithQueryResult;
}