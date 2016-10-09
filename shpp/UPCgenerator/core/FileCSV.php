<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 22.08.2016
 * Time: 21:46
 */

namespace core;

class FileCSV
{
    public $csv_name = null;
    public $str = null;

    /**
     * Name result file
     */
    public function name()
    {
        return "save/" . date("m-d-y") . "-" . date("H-i-s") . ".csv";
    }

    /**
     * @internal param
     * @internal param $name
     */
    function __construct()
    {
        if (!file_exists())// if file exists
            file_put_contents($this->name(), ""); // Creation file
        else // if file not exists
            $this->csv_name = $name;
    }

    /**
     * Main method for record array in file csv
     * @internal param $array
     * @param $array
     */
    public function setIn($array)
    {
        $output = fopen($this->name(), "w");
        foreach ($array as $value) {
            fputcsv($output, explode(',', $value));
        }
        fclose($output);
    }

    /**
     * Link for save file
     * */
    public function saveUri()
    {
        return $this->name();
    }
}

?>