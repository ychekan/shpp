<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 20.09.2016
 * Time: 0:54
 */

namespace vendor\core;

class Render
{
    /**
     * The class for include views in directory
     *
     * @param $name - name
     * @param array $db_content - array variable for transfer to views, default empty
     * @return mixed
     */
    public function viewRender($name, $db_content = [])
    {
        extract($db_content);
        ob_start();
        include "/../../app/views/$name.php";
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
    }

    /**
     * The method for include file $model
     * @param $model - name include file
     * @return mixed
     */
    public function modelRender($model)
    {
        include  "/../../app/models/$model.php";
    }

    /**
     * The method for include file $model
     * @param $template - name template
     * @return mixed
     */
    public function renderTemplete($template, $content = [])
    {
        include "/../../app/views/template/$template.php";
    }
}