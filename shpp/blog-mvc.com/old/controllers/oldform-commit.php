<?php

include "./views/form-com.php";

if (isset($_POST['submitD'])) {
    
    include "./models/Database.php";
    include "./models/Insert.php";
    $data['id_acticle'] = "2";
    $data['content'] = $_POST['content'];
    $data['e-mail'] = $_POST['mail'];
    print_r($data);
    $insertCom = new Insert('Commit', $data);
    $insertCom->setDataToDb();
}
//unset($_POST);
?>