<?php
	// // サーバ接続
	$db_user = "testuser";
	$db_pass = "Nananana1?";
	$db_host = "localhost";
	$db_name = "recipe";
	$db_type = "mysql";

	$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
	try
	{
		$pdo = new PDO($dsn,$db_user,$db_pass);
		$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	}
	catch(PDOException $Ecception)
	{
		die('エラー:'.$Ecception->getMessage());
	}
	//insert処理
	try
	{

		//ヘッダー部分登録処理
		$pdo -> beginTransaction();
		$sql = "insert into recipe_header (title,amount,ingredients,memo,picture,inserted_date,updated_date)
		values(:title,:amount,:ingredients,:memo,:picture,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':title',$_POST[title],PDO::PARAM_STR);
		$stmh -> bindValue(':amount',$_POST[amount],PDO::PARAM_INT);
		$stmh -> bindValue(':ingredients',$_POST[ingredients],PDO::PARAM_STR);
		$stmh -> bindValue(':memo',$_POST[memo],PDO::PARAM_STR);
		$stmh -> bindValue(':picture',$_POST[filename],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();

		//ヘッダーからidを取得
		$pdo -> beginTransaction();		
		$stmh = $pdo->prepare("select id from recipe_header where inserted_date =(select max(inserted_date) from recipe_header)");
		$stmh->execute();
		$result = $stmh->fetch(PDO::FETCH_ASSOC);
		//print($result['id']);
		$pdo -> commit();
	
		//ディテール部分登録処理
		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',1,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe1],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();

		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',2,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe2],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();

		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',3,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe3],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();

		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',4,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe4],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();

		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',5,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe5],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();
		
		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',6,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe6],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();

		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',7,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe7],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();

		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',8,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe8],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();

		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',9,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe9],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();

		$pdo -> beginTransaction();
		$sql = "insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())";
		$stmh = $pdo -> prepare($sql);
		$stmh -> bindValue(':id',$result['id'],PDO::PARAM_INT);
		$stmh -> bindValue(':number',10,PDO::PARAM_INT);
		$stmh -> bindValue(':step',$_POST[recipe10],PDO::PARAM_STR);
		$stmh -> execute();
		$pdo -> commit();
	?>
		<!DOCTYPE html>
		<head>
		<meta http-equiv="refresh" content="0;URL=http://192.168.33.10/entry.php">
		</head>
		</html>
<?php
	}
	catch(PDOException $Exception)
	{
		$filename = $_POST[filename];
		echo $filename;
		$pdo -> rollBack();
		//print"エラーです:".$Exception -> getMessage();
?>
		<!DOCTYPE html>
		<head>
		<meta http-equiv="refresh" content="0;URL=http://192.168.33.10/err.php">
		</head>
		</html>		
<?php		
	}
?>