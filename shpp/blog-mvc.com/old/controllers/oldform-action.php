<?php




//include "./views/form.php";

//if (isset($_POST['submitD'])) {
	include "./models/Insert.php";

	$data['title'] = $_POST['title'];
	$data['status'] = $_POST['status'];
	$data['content'] = $_POST['content'];
	$date['name'] = $_SESSION['login'];
	$data['tags'] = htmlspecialchars($_POST['tags']);
	$data['uri'] = $_FILES['img']; 	
   /*	print_r($_FILES);
	if(isset($_FILES['img'])){
  		$name = $_FILES['img']['name'];
  		@move_uploaded_file($_FILES['img']['tmp_name'],"upload/$name");
	}*/
	//$data['uri'] = $name;
// Default img
	//print_r($data);
	$insertPost = new Insert('Article', $data);
	$insertPost->setDataToDb();
//}
	
?>
