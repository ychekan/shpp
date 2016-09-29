<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 28.09.2016
 * Time: 21:40
 */

namespace app\models;

use app\models\Query;
use vendor\core\Render;

class Main
{
    /**
     * The method for view block index page, last $count article
     * @param $count - count last article
     * @return mixed, usually this html code
     */
    public static function posts($count)
    {
        $object = new Query("Article"); // Use `Article` table
        $render = new Render();
        return $render->viewRender("main/index", [
            "db_content" => $object->selectLastArticle($count)
        ]);
    }

    /**
     * Static page for view someone information, usually the history company
     * @return mixed, usually this html code
     */
    public static function about()
    {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $object = new Query("Document"); // Use `Document` table
        $render = new Render();
        return $render->viewRender("main/about");/*, [
            "db_content" => $object->getSelectDoc('about')
        ]);*/
    }

    public static function add()
    {
        $render = new Render();

        return $render->viewRender("");
    }

}