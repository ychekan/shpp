<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 05.09.2016
 * Time: 1:15
 */

namespace core\controllers;


class Post
{
    public function __construct($post)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($post['authorise']))
                echo "test authorise";
            if (isset($post['guest']))
                echo "test guest";
            
        }
    }

}