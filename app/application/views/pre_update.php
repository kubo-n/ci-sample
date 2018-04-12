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
        $title = $_GET[title];
        $id = $_GET[id];
        //echo $title,$id ;

		//ヘッダー情報を取得
		$pdo -> beginTransaction();		
        $stmh = $pdo->prepare("select*from recipe_header where id =$id");
		$stmh->execute();
        $pdo -> commit();

        //ヘッダー内容の確認
        foreach ($stmh as $row) :
            $amount = $row['amount'];
            $ingredients = $row['ingredients'];
            $memo = $row['memo'];
            $picture = $row['picture'];
//            $inserted_date = $row['inserted_date'];
//            $updated_date = $row['updated_date'];
        endforeach;

        //ディテール情報を取得(レシピ1)⇒面倒くさい処理。10個必要。
        $pdo -> beginTransaction();		
        $stmh1 = $pdo->prepare("select step from recipe_detail where id =$id and number = 1 order by number");
        $stmh1->execute();
        $pdo -> commit();
        foreach ($stmh1 as $row1):
        $recipe1 = $row1[0];
        endforeach;
        //ディテール情報を取得(レシピ2)
        $pdo -> beginTransaction();		
        $stmh2 = $pdo->prepare("select step from recipe_detail where id =$id and number = 2 order by number");
        $stmh2->execute();
        $pdo -> commit();
        foreach ($stmh2 as $row2):
        $recipe2 = $row2[0];
        endforeach;
        //ディテール情報を取得(レシピ3)
        $pdo -> beginTransaction();		
        $stmh3 = $pdo->prepare("select step from recipe_detail where id =$id and number = 3 order by number");
        $stmh3->execute();
        $pdo -> commit();
        foreach ($stmh3 as $row3):
        $recipe3 = $row3[0];
        endforeach; 
        //ディテール情報を取得(レシピ4)
        $pdo -> beginTransaction();		
        $stmh4 = $pdo->prepare("select step from recipe_detail where id =$id and number = 4 order by number");
        $stmh4->execute();
        $pdo -> commit();
        foreach ($stmh4 as $row4):
        $recipe4 = $row4[0];
        endforeach;
        //ディテール情報を取得(レシピ5)
        $pdo -> beginTransaction();		
        $stmh5 = $pdo->prepare("select step from recipe_detail where id =$id and number = 5 order by number");
        $stmh5->execute();
        $pdo -> commit();
        foreach ($stmh5 as $row5):
        $recipe5 = $row5[0];
        endforeach;
        //ディテール情報を取得(レシピ6)
        $pdo -> beginTransaction();		
        $stmh6 = $pdo->prepare("select step from recipe_detail where id =$id and number = 6 order by number");
        $stmh6->execute();
        $pdo -> commit();
        foreach ($stmh6 as $row6):
        $recipe6 = $row6[0];
        endforeach;
        //ディテール情報を取得(レシピ7)
        $pdo -> beginTransaction();		
        $stmh7 = $pdo->prepare("select step from recipe_detail where id =$id and number = 7 order by number");
        $stmh7->execute();
        $pdo -> commit();
        foreach ($stmh7 as $row7):
        $recipe7 = $row7[0];
        endforeach;
        //ディテール情報を取得(レシピ8)
        $pdo -> beginTransaction();		
        $stmh8 = $pdo->prepare("select step from recipe_detail where id =$id and number = 8 order by number");
        $stmh8->execute();
        $pdo -> commit();
        foreach ($stmh8 as $row8):
        $recipe8 = $row8[0];
        endforeach;
        //ディテール情報を取得(レシピ9)
        $pdo -> beginTransaction();		
        $stmh9 = $pdo->prepare("select step from recipe_detail where id =$id and number = 9 order by number");
        $stmh9->execute();
        $pdo -> commit();
        foreach ($stmh9 as $row9):
        $recipe9 = $row9[0];
        endforeach;
        //ディテール情報を取得(レシピ10)
        $pdo -> beginTransaction();		
        $stmh10 = $pdo->prepare("select step from recipe_detail where id =$id and number = 10 order by number");
        $stmh10->execute();
        $pdo -> commit();
        foreach ($stmh10 as $row10):
        $recipe10 = $row10[0];
        endforeach;
        }
	catch(PDOException $Exception)
	{
		$pdo -> rollBack();
		print"エラーです:".$Exception -> getMessage();
    }
?>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title?></title>
</head>
<script type="text/javascript">
    //更新ページ遷移処理
    function transition(){
        var formdata = new FormData(document.getElementById("update_form"))
        if (document.getElementById('title').value == "" ){
            alert('タイトルが未入力です。');
            return false;
        }else if(document.getElementById('amount').value == "" ){
            alert('分量(何人分)が未入力です。');
            return false;
        }else if(document.getElementById('amount').value.match(/[^0-9]+/)){
            alert('分量(何人分)は数値を入力してください。');
            return false;
        }else if(document.getElementById('ingredients').value == "" ){
            alert('材料が未入力です。');
            return false;
        }else if(document.getElementById('recipe1').value == "" ){
            alert('レシピが未入力です。');
            return false;        
        }else{
        // 「OK」時の処理 ＋ 確認ダイアログの表示
        if(window.confirm('更新してもよろしいですか？')){
            //alert(document.getElementById("title").value);
            xhttpreq.open("POST", "update.php", true);
            xhttpreq.send(formdata);
            return true;
        }
    }
}
</script> 
<body>
    <body background="img/back.gif" text="#660000">
    <style>
        .wrapper {
            margin: 0 auto;
            text-align: center;
        }
        .txt {
            display: inline-block;
            text-align: left;
            width: 500px;
        }
        .txt_1 {
            display: inline-block;
            text-align: right;
            width: 500px;
        }
    </style>
    <div class="wrapper">
        <img src="img/title.jpg" width="500" alt="title">
        <br><br>
        <hr width="500">
        <a href="index.html">トップ</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
　      <a href="list.php">記事一覧</a><br>
        <hr width="500">
        <form id="update_form" name="form1" method ="post" action="update.php">
        <input type="hidden" value="<?php echo $id?>" name="id">
        <p class="txt">
        タイトル&emsp;<input type="text" value="<?php echo $title?>" name="title" id="title" size="48"><br><br>
        材料(<input type="text" value="<?php echo $amount?>" name="amount" id="amount" size="3+">)人分<br>
        &emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="ingredients" id="ingredients" rows="5" cols="50" wrap="hard"><?php echo $ingredients?></textarea><br>
        
        レシピ<br>
        &emsp;&emsp;&emsp;&emsp;1<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe1" id="recipe1" rows="3" cols="50" wrap="hard"><?php echo $recipe1?></textarea><br>
        &emsp;&emsp;&emsp;&emsp;2<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe2" id="recipe2" rows="3" cols="50" wrap="hard"><?php echo $recipe2?></textarea><br>
        &emsp;&emsp;&emsp;&emsp;3<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe3" id="recipe3" rows="3" cols="50" wrap="hard"><?php echo $recipe3?></textarea><br>
        &emsp;&emsp;&emsp;&emsp;4<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe4" id="recipe4" rows="3" cols="50" wrap="hard"><?php echo $recipe4?></textarea><br>
        &emsp;&emsp;&emsp;&emsp;5<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe5" id="recipe5" rows="3" cols="50" wrap="hard"><?php echo $recipe5?></textarea><br>
        &emsp;&emsp;&emsp;&emsp;6<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe6" id="recipe6" rows="3" cols="50" wrap="hard"><?php echo $recipe6?></textarea><br>
        &emsp;&emsp;&emsp;&emsp;7<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe7" id="recipe7" rows="3" cols="50" wrap="hard"><?php echo $recipe7?></textarea><br>
        &emsp;&emsp;&emsp;&emsp;8<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe8" id="recipe8" rows="3" cols="50" wrap="hard"><?php echo $recipe8?></textarea><br>
        &emsp;&emsp;&emsp;&emsp;9<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe9" id="recipe9" rows="3" cols="50" wrap="hard"><?php echo $recipe9?></textarea><br>
        &emsp;&emsp;&emsp;&emsp;10<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe10" id="recipe10" rows="3" cols="50" wrap="hard"><?php echo $recipe10?></textarea><br>
        
        その他メモ<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea name="memo" id="memo" rows="5" cols="50" wrap="hard"><?php echo $memo?></textarea><br>
        <br>
        &emsp;&emsp;<a href="list.php">戻る</a></p>
        <div class="wrapper">
        <input type="submit" value="更新" onclick="Javascript:transition();return false;">
        </form>
        </div>
        <hr width="500">
    </div>
    </body>
</body>
</html>