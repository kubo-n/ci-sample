<!DOCTYPE html>
<html lang="ja">
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
    try
	{	
        $id = $_POST[id];
        //echo $id;

		//ヘッダー情報を削除
		$pdo -> beginTransaction();		
        $stmh = $pdo->prepare("delete from recipe_header where id =$id");
		$stmh->execute();
        $pdo -> commit();
        //ディテール情報を削除
		$pdo -> beginTransaction();		
        $stmh = $pdo->prepare("delete from recipe_detail where id =$id");
		$stmh->execute();
        $pdo -> commit();
    }
    catch(PDOException $Exception)
	{
		$pdo -> rollBack();
		print"エラーです:".$Exception -> getMessage();
	}
?>
<head>
    <meta charset="UTF-8">
    <title>MY RECIPE</title>
</head>
<body>
    <body background="img/back.gif" text="#660000">
        <div align="center">
        <img src="img/title.jpg" width="500" alt="title">
        <br><br>
        <hr width="500">
        <a href="index.html">トップ</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
　      <a href="list.php">記事一覧</a><br>
        <hr width="500"><br>
        <font size="3">削除が完了しました。</font><br>
        <a href="list.php">戻る</a>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <hr width="500">
    </div>
    </body>
</body>
</html>