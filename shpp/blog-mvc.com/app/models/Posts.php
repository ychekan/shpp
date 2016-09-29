<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 29.09.2016
 * Time: 23:05
 */

namespace app\models;

use app\models\Query;
use vendor\core\Render;

class Posts
{
    /**
     * @param $id
     * @return mixed
     */
    public static function viewData($id)
    {
        $object = new Query("Article"); // Use `Article` table
        $render = new Render();
        return $render->viewRender("posts/view", [
            "db_content" => $object->getSelectById($id),
            "id" => $id
        ]);
    }

    /**
     * The for delete article and comment
     * @return redirect
     * @internal param $id - id data
     */
    public static function deleteData($id)
    {

        return null;
    }


    /**
     * The for edit and update article and comment
     * @return update data
     * @internal param $id - id data
     */
    public static function edit($id)
    {

        return null;
    }
}