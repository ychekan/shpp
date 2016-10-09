<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 06.09.2016
 * Time: 22:13
 */

namespace core\helpers;

//  use core\traits\MainTraits;

class SwitchPage
{
 //   use MainTraits;
    const DIR_VIEWS = "./core/views/";
    const DIR_MODEL = "./core/models/";
    public $get;

    public function __construct($getInput)
    {
        $this->get = $getInput;
    }

    /**
     * Included block content for use $_GET method
     */
    public function getContent()
    {
        if (isset($this->get['url']) && file_exists(self::DIR_VIEWS . $this->get['url'] . ".php"))
            include self::DIR_VIEWS . $this->get['url'] . ".php";
        elseif (!isset($this->get['url']) || $this->get['url'] == "index.php")
            include self::DIR_VIEWS . "page.php";
        elseif (isset($this->get['url']) && !file_exists(self::DIR_VIEWS . $this->get['url'] . ".php"))
            include self::DIR_VIEWS . "404.php";
        elseif (isset($this->get['activitys']));// && file_exists(self::DIR_MODEL . $this->get['activitys'] . ".php"))
            //use core\traits\MainTraits();
            //$this->test();
            //include self::DIR_MODEL . $this->get['activity'] . ".php";
    }

}