<?php
	class conDB
	{
		
		//初始化連線
		static $conn = NULL;
		
		//設定連線方法
		public function getConnection()
		{
			
			$serverName ="localhost:3307"; // 伺服器位置
			$databaseName = "account"; // 資料庫名稱
			$dbuser="root"; //資料庫登入帳號
			$dbpassword =""; //資料庫登入密碼
			
			if(!isset(self::$conn)) // 判斷連線是否已經設定，如果沒有的話，執行連線設定
			{
				try{
				//設定PDO
				self::$conn = new PDO("mysql:host=$serverName; dbname=$databaseName;",$dbuser,$dbpassword);
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$conn->exec("set names utf8");
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
					error_log($e->getMessage(),0); //error_log0 ->在PHP服務器裡記錄錯誤
				}
			}
			return self::$conn;
		}
		
	}
	

?>