<html>
<head>
<meta charset="UTF-8">
<title>管理者頁面</title>
<style>
		td
		{
			border:1px solid #b1b2b4;
			text-align:center;
			font-family:微軟正黑體;
		}
		
</style>
</head>
<?php
	require_once 'conDB.php';
	$db =new conDB(); // 做class的物件
	$conn =$db->getConnection(); //調用動態方法
	$stmt =$conn->prepare("select * from  user where pass =0");
	$stmt -> execute();
	$result = $stmt ->fetchAll(PDO::FETCH_CLASS);
	echo "<table><tr>
				<td>Account</td>
				<td>Password</td>
				<td>Name</td>
				<td>Address</td>
				<td>Phone</td>
				<td>Manager</td>
				</tr>";
	foreach($result as $value)
	{
		echo "<tr>";
		echo "<td>".$value->account."</td>".
			"<td>".$value->password."</td>".
			"<td>".$value->name."</td>".
			"<td>".$value->address."</td>".
			"<td>".$value->phone."</td>";
		
		echo "<form method= 'post' action='updateAccount.php' ><td><input style='display:none'type ='text' name='id' value=".$value->id."><input type='submit' value='通過審核'></td></form>";
		echo "</tr>";
	}
	echo "</table>";

?>
</body>
</html>