<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 22.08.2016
 * Time: 20:56
 */
namespace core;

use core\FileCSV;
use core\Query;

class Main extends FileCSV
{
    const SAVE = "./save/";
    const DELETE_TIME = 86400;// The maximum time life file (in sec). 1 day = 86400 sec
    public $arrayDir = null;
    private $query;

    /**
     * Event in existence submit
     * @input param GLOBAL array $_POST
     */
    public function __construct()
    {
        $this->query = new Query();
        self::clearSaveDir();
        if (isset($_POST['generic']))
            self::upsKey($_POST, false);
        else if ($_POST['print'])
            self::upsKey($_POST, true);
    }

    /**
     * The generic UPS key for save file
     * @param $post - input array
     * @param $flag - boolean flag for use method save or only print result
     */
    public function upsKey($post, $flag)
    {
        if (self::validValue($post)) {
            $result = null;
            if ($flag) echo "<div class='box-content'><div class='box-inner'><div class='box-content'>"; // For view in textarea
            for ($i = 0; $i < (int)$post['count']; ++$i) {
                $result = $post['prefix'] . $post['main'] . str_pad(($post['start'] + $i), strlen($post['start']), "0", STR_PAD_LEFT);
                $result_finale = $result . self::kod($result);
                if (strlen($result_finale) > 12)
                    $result_finale = substr($result_finale, 0, 6) . substr($result_finale, 7, 12);
                if (strlen($result_finale) < 12)
                    break;
                if (self::checkValidation($result_finale)) {
                    $array[] = $result_finale;
                    if ($flag)
                        echo $result_finale . "<br />";
                } else {
                    $post['count']++;
                }
            }
            if (count($array) == 0) echo "<div class='alert alert-danger'>Не верное количество символов!</div>";
            if ($flag) echo "</div></div></div>"; // For view in textarea
            if (count($array) > 0) parent::setIn($array); // save result in file
            if (!$flag) self::save();
        } else
            echo "<div class='box-content'><div class='alert alert-danger'>Не проходит валидацию!</div></div>";

    }

    /**
     * Check validation value
     * @param $arr - input array from form
     * @return boolean
     */
    private function validValue($arr)
    {
        if ($arr['prefix'] > 9)
            return false;
        if ($arr['count'] < 0 || $arr['count'] > 1000)
            return false;
        if (strlen($arr['start']) != 5)
            return false;
        if (strlen($arr['main']) != 5)
            return false;
        return true;
    }

    /**
     * Value key from upc (12 symbol)
     * @param - input $array
     * @return null|string
     */
    public function kod($array)
    {
        $result = null;
        $arr_not_par = null;
        $arr_par = null;
        for ($i = 0; $i < strlen($array); ++$i) {
            if ($i % 2 == 0)
                $arr_par += $array[$i];
            else
                $arr_not_par += $array[$i];
        }
        $result .= ($arr_par) * 3 + ($arr_not_par);
        return substr(10 - (int)(substr($result, -1, 1)), -1, 1);
    }

    /**
     * For save file, print link
     * Use parent method saveUri()
     */
    public function save()
    {
        echo "<a href='" . parent::saveUri() . "'>Save</a>";
    }

    /**
     * @param $str
     * @return bool
     */
    private function checkValidation($str)
    {
        return ($this->query->main($str)) ? true : false;
    }

    /**
     * For clear directory, delete old file (time save 3 day)
     * Const DELETE_TIME - control time delete file
     * Const SAVE - directory where saved files
     */
    private static function clearSaveDir()
    {
        /**
         * The get a array file names
         */
        if ($dir = opendir(self::SAVE)) {
            while (($file = readdir($dir)) != false)
                if (!file_exists($file))
                    $arrayDir[] = $file;
            closedir($dir);
        }
        /**
         * The check time for end lifetime
         */
        for ($i = 0; $i < count($arrayDir); ++$i) {
            $endtime = time() - filemtime(self::SAVE . $arrayDir[$i]);
            if ($endtime > self::DELETE_TIME)
                unlink(self::SAVE . $arrayDir[$i]);
        }
    }
}