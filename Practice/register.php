<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
	require_once 'conDB.php';
	$db =new conDB(); // 做class的物件
	$conn =$db->getConnection(); //調用動態方法
	$stmt =$conn->prepare("select * from  user where account='".$_POST['account']."'");
	$stmt -> execute();
	$result = $stmt ->fetchAll(PDO::FETCH_CLASS);
	// 傳回指定類別的實例，將每行的列對應到類別中的命名屬性。
	$account_flag=0; //判斷帳號是否存在，0不存在，1存在
	foreach($result as $value)
	{
		if($value->account!="") // 如果不等於空字串，代表帳號已經存在
		{
			$account_flag=1;
		}
	}
	if($account_flag ==0 && $_POST['account']!="")
	{
		$stmt=$conn->prepare("insert into user(account,password,name,phone,address,pass)
		values('".$_POST['account']."','".$_POST['password']."','".$_POST['name']."','".$_POST['phone']."','".$_POST['address']."',0)");
		$stmt->execute();
		echo "<a href ='register.html'>註冊成功</a>";
	}
	else
	{
		echo "<a href='register.html'>帳號已存在</a>";
	}
?>
</body>
</html>