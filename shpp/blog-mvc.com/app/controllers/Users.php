<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 20.09.2016
 * Time: 1:23
 */

namespace app\controllers;

use app\models\Query;
use vendor\core\Render;
use app\models\PostsNew;

class Users extends Render
{
    public function loginAction()
    {
        $obj = new PostsNew();
        $obj->identificationUser();
        echo "User::login";
        $object = new Query("Article");
        /** @noinspection PhpUndefinedMethodInspection */
        $this->renderTemplete("index",
            $this->viewRender("user/login", [

            ]));
    }


}