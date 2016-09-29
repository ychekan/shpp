<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 20.09.2016
 * Time: 0:43
 */

namespace app\controllers;


class Pdf
{


    /**
     * Default method index
     *
     */
    public function indexAction()
    {
        /*return $this->render("index");
        show*/
        return 'Test content';


    }

    public function testAction()
    {
        echo "Main::test";
    }

    public function testPage()
    {
        echo "Main::testPage";
    }

    private function viewPost()
    {

    }


}