<?php
include 'main.php';
/**
 * Created by PhpStorm.
 * User: Yurii Chekan
 * Date: 08.08.2016
 * Time: 01:35
 * gromret@gmail.com
 */
/**
 * Connect to any place and pass an array of absolute paths pdf files
 *
 */
if ($handle = opendir('./pdf/')) {
    echo $handle;
    while (false !== ($file = readdir($handle))) {
        $name[] = $file;
        print_r($file);
        echo "<br>";
    }
    closedir($handle);
}
$arr = array("pdf/e8d786980b9d8a470cc7d76ccfaf6423.pdf", "pdf/b1a3d367dd3ed63b042f8fe9b4efc147.pdf",
    "pdf/a666b81aca38581e63ce00874e4458d3.pdf"); // Input array

$arrMode = array('download', 'browser', 'file'); // default show

$obj = new Main($arr);
$obj->mergePdf($arrMode[2], 'pdf/');

?>