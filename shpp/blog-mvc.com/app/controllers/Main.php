<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 17.09.2016
 * Time: 22:49
 */

namespace app\controllers;

use app\models\Query;
use vendor\core\Render;
use app\models\Main as MainModel;

class Main extends Render
{
    const COUNT_ARTICLE_INDEX = 5;

    /**
     * Default method index
     * Use model Main, she return html text
     * Use model Main :: index
     * COUNT_ARTICLE_INDEX - count article in index page
     * @return mixed
     */
    public function indexAction()
    {
        $this->renderTemplete("index", MainModel::posts(self::COUNT_ARTICLE_INDEX));
    }

    /**
     * The method for view page about us, company info
     * Use model Main :: about
     * @return mixed
     */
    public function aboutAction()
    {
        $this->renderTemplete("index", MainModel::about());
    }

    public function testAction($id)
    {
        echo "Main::test = $id";
        $object = new Query("Article");

        $this->renderTemplete("index",
            $this->viewRender("main/index", [
                "db_content" => $object->getSelectById(301)
            ]));
    }


    /**
     * For test
     */
    public function bag()
    {
//        $this->renderTemplete("index",
//            $this->viewRender("main/index", [
//                "db_content" => $object->selectLastArticle(5)
//            ]));
    }

}