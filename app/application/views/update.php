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
		//ヘッダー情報を更新
        $pdo -> beginTransaction();
        $sql = "update recipe_header set title =:title, amount =:amount, ingredients =:ingredients, memo =:memo, updated_date= now() where id =:id";
		$stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':title',$_POST[title],PDO::PARAM_STR);
		$stmh -> bindValue(':amount',$_POST[amount],PDO::PARAM_INT);
		$stmh -> bindValue(':ingredients',$_POST[ingredients],PDO::PARAM_STR);
		$stmh -> bindValue(':memo',$_POST[memo],PDO::PARAM_STR);
		$stmh->execute();
        $pdo -> commit();

        //ディテール情報を更新
        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =1";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe1],PDO::PARAM_STR);
        $stmh -> execute();
        $pdo -> commit();
    
        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =2";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe2],PDO::PARAM_STR);
        $stmh -> execute();
        $pdo -> commit();

        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =3";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe3],PDO::PARAM_STR);
        $stmh -> execute();
        $pdo -> commit();
        
        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =4";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe4],PDO::PARAM_STR);
        $stmh -> execute();
        $pdo -> commit();

        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =5";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe5],PDO::PARAM_STR);
        $stmh -> execute();
        $pdo -> commit();

        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =6";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe6],PDO::PARAM_STR);
        $stmh -> execute();
        $pdo -> commit();

        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =7";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe7],PDO::PARAM_STR);
        $stmh -> execute();
        $pdo -> commit();

        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =8";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe8],PDO::PARAM_STR);
        $stmh -> execute();
        $pdo -> commit();

        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =9";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe9],PDO::PARAM_STR);
        $stmh -> execute();
        $pdo -> commit();

        $pdo -> beginTransaction();
        $sql = "update recipe_detail set step =:step, updated_date= now() where id =:id and number =10";
        $stmh = $pdo -> prepare($sql);
        $stmh -> bindValue(':id',$_POST[id],PDO::PARAM_INT);
        $stmh -> bindValue(':step',$_POST[recipe10],PDO::PARAM_STR);
        $stmh -> execute();
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
        <font size="3">更新が完了しました。</font><br>
        <a href="list.php">戻る</a>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <hr width="500">
    </div>
    </body>
</body>
</html>