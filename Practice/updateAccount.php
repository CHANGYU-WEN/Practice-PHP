<?php
	require_once 'conDB.php';
	$db=new conDB();
	$conn =$db->getConnection();
	$stmt =$conn->prepare("update user set pass=1 where id =".$_POST['id']);
	$stmt-> execute();
	echo "<a href ='register.html'>審核成功，回到登入畫面</a>";
?>