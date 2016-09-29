<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 17.09.2016
 * Time: 22:49
 */

namespace app\controllers;

use vendor\core\Render;
use app\models\Query;
use app\models\Posts as PostsModel;

class Posts extends Render
{

    public function indexAction($id_url_input)
    {
        echo "Posts::index";
        echo $id_url_input;
        //$id_url_input = 301;
        $object = new Query("Article");

        $this->renderTemplete("index",
            $this->viewRender("main/index", [
                "db_content" => $object->getSelectById($id_url_input)
            ]));
    }


    /**
     *
     *
     * @param $id_url - the id number article
     * @return mixed
     */

    public function viewAction($id_url)
    {
        $this->renderTemplete("index", PostsModel::viewData($id_url));
//        echo "Posts::view<br>";
//        //echo $id_url;
//        //$id_url_input = 301;
//        $object = new Query("Article");
//
//        $this->renderTemplete("index",
//            $this->viewRender("main/index", [
//                "db_content" => $object->getSelectById(301)
//            ]));
    }

    /**
     *
     *
     * @param $id_url - the id number article
     * @return mixed
     */
    public function deleteAction($id)
    {
        /** @noinspection PhpInternalEntityUsedInspection */
        $this->renderTemplete("index", PostsModel::deleteData($id));
    }

    /**
     *
     *
     * @param $id_url - the id number article
     * @return mixed
     */
    public function editAction($id)
    {
        /** @noinspection PhpInternalEntityUsedInspection */
        $this->renderTemplete("index", PostsModel::editData($id));
    }

    public function newAction($id_url)
    {
        echo "Posts::new";
        $id_url = 301;
        $object = new Query("Article");

        $this->renderTemplete("index",
            $this->viewRender("main/index", [
                "db_content" => $object->getSelectById($id_url)
            ]));
    }

    public function allAction()
    {
        echo "Posts::all";
        //$id_url = 301;
        $object = new Query("Article");

        $this->renderTemplete("index",
            $this->viewRender("main/index", [
                "db_content" => $object->getSelectById(301)
            ]));
    }

    public function index($id_url)
    {
        echo "I am Posts::debug!";
    }

}