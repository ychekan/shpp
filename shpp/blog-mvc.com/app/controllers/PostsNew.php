<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 18.09.2016
 * Time: 10:30
 */

namespace app\controllers;

use app\models\PostsNew as ModelPostsNew;
use vendor\core\Render;


class PostsNew extends Render
{
    /**
     * For view and working form
     * Use model Form :: new
     * @return mixed
     */
    public function newAction()
    {
        $this->renderTemplete("index", ModelPostsNew::news());
    }

    public function testAction()
    {
        //return file_get_contents(dirname(__DIR__) . "/views/form.php");
    }

    public function testPageAction()
    {
        echo "PostsNew::testPage";
    }

    public function before()
    {
        echo "PostsNew::before";
    }

    public function testOld()
    {
        echo "PostsNew::test";
    }

    public function viewsAction()
    {
        echo "PostsNew::before";
    }
}
