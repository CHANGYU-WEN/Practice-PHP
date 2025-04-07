<?php
	require_once 'conDB.php';
	$db= new conDB();
	$conn =$db->getConnection();
	$stmt=$conn->prepare("select * from user where account ='". $_POST['account']."' 
								and password ='".$_POST['pw']."'");
	$stmt->execute();
	$result = $stmt ->fetchAll(PDO::FETCH_CLASS);

	//如果帳號密碼不匹配，result為空值
	
	if(empty($result))
	{
		echo "Login failed";
	}
	else
	{
		foreach($result as $value)
		{
		
			if($value->account!="" && $value->pass==1)
			{
				//會員登入後轉向
				header("Location:https://google.com");
			}
			else if ($value->account!="" && $value->pass==0)
			{
				echo "管理員審核中，審核通過後即可登入";
				
			} //內層else if 的括號
		} // foreach的括號
	}//外層else的括號


?>