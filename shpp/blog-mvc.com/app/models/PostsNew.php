<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 28.09.2016
 * Time: 1:31
 */

namespace app\models;

use app\models\Query;
use vendor\core\Render;

class PostsNew
{
    public function __construct()
    {
        //debug($_POST);
    }

    public function identificationUser()
    {
        echo "I am Form::identificationUser";
    }

    public static function news()
    {
        $object = new Query("Article"); // Use `Article` table
        $render = new Render();
        return $render->viewRender("posts-new/form");
    }

    public function test(){
        if (isset($_POST))//['submit']) && $_POST['submit'] = "setArticle" )
            echo "Norm uses form";
    }
}