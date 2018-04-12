<!DOCTYPE html>
<html lang="ja">
<?php
	// // サーバ
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
    /*    $row3[9];    

        for( $i = 0 ; $i == 9 ; $i++)
        {
 		// //ディテール情報を取得
         $pdo -> beginTransaction();		
         $stmh2 = $pdo->prepare("select step from recipe_detail where id =$id and number = $i");
         $stmh2->execute();
         $pdo -> commit();
         echo  $stmh2;
         
        // foreach文で配列の中身を一行ずつ出力
        //foreach ($stmh2 as $row2):
        $row3[$i] = $stmh2[0];
        //echo $recipe1;
        //echo $stmh2[0];
        $recipe2 = $row2[1];
        $recipe3 = $row2[2];
        $recipe4 = $row2[3];
        $recipe5 = $row2[4];
        $recipe6 = $row2[5];
        $recipe7 = $row2[6];
        $recipe8 = $row2[7];
        $recipe9 = $row2[8];
        $recipe10 = $row2[9];
        //endforeach;
        }*/
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
    <script type="text/javascript">
		function adustTextarea(){
		    var textarea = document.getElementById("ingredients");
		    if( textarea.scrollHeight > textarea.offsetHeight ){
  	              textarea.style.height = textarea.scrollHeight+'px';
		    }
            textarea = document.getElementById("recipe1");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe1");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("recipe2");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe2");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("recipe3");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe3");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("recipe4");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe4");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("recipe5");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe5");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("recipe6");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe6");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("recipe7");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe7");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("recipe8");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe8");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("recipe9");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe9");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("recipe10");
            if(textarea != null)
            {
                textarea = document.getElementById("recipe10");
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
            textarea = document.getElementById("memo");
            if(textarea != null)
            {
		        if( textarea.scrollHeight > textarea.offsetHeight )
                {
  	                textarea.style.height = textarea.scrollHeight+'px';
		        }
            }
		}
	</script>
</head>
<script type="text/javascript">
    //削除ページ遷移処理
    function transition(){
        var formdata = new FormData(document.getElementById("delete_form"))
        // 「OK」時の処理 ＋ 確認ダイアログの表示
        if(window.confirm('削除してもよろしいですか？')){
//            location.href = "delete.php"; // 遷移
            xhttpreq.open("POST", "delete.php", true);
            xhttpreq.send(formdata);
            return true;
        }
    }
</script> 
<body onload="adustTextarea();">
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
    </style>
    <div class="wrapper">
        <img src="img/title.jpg" width="500" alt="title">
        <br><br>
        <hr width="500">
        <a href="index.html">トップ</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
　      <a href="list.php">記事一覧</a><br>
        <hr width="500">
        <p class="txt">
        <!--タイトル-->
        <img src="img/kitchen3.jpg" width="200" alt="kitchen" align="middle">
        <br><br>
        <input type="text" style="border:0;background-color:transparent;color:#660000;font-size:25px;" readonly value="<?php echo $title?>" name="title" id="title" size="48"><br><br>
        <?php if ($picture != ""){ ?>
<!--        <img src="http://192.168.33.10/files/<?php echo $picture?>" alt="picture" title="picture" width="300" height="200"><br>-->
            <img src="http://192.168.33.10/files/<?php echo $picture?>" alt="picture" title="<?php echo $picture?>" width="300"><br>
        <?php } ?>
        材料(<input type="text" style="border:0;background-color:transparent;color:#660000;" readonly value="<?php echo $amount?>" name="amount" id="amount" size="3+">)人分<br>
        &emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="ingredients" style="border:0;background-color:transparent;color:#660000;" readonly id="ingredients" rows="5" cols="50" wrap="hard"><?php echo $ingredients?></textarea><br>
        
        レシピ<br>
        &emsp;&emsp;&emsp;&emsp;1<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe1" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe1" rows="3" cols="50" wrap="hard"><?php echo $recipe1?></textarea><br>
        <?php 
        if ($recipe2 != ""){
        ?>
        &emsp;&emsp;&emsp;&emsp;2<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe2" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe2" rows="3" cols="50" wrap="hard"><?php echo $recipe2?></textarea><br>
        <?php 
        }
        if ($recipe3 != ""){
        ?>
        &emsp;&emsp;&emsp;&emsp;3<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe3" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe3" rows="3" cols="50" wrap="hard"><?php echo $recipe3?></textarea><br>
        <?php 
        }
        if ($recipe4 != ""){
        ?>
        &emsp;&emsp;&emsp;&emsp;4<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe4" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe4" rows="3" cols="50" wrap="hard"><?php echo $recipe4?></textarea><br>
        <?php 
        }
        if ($recipe5 != ""){
        ?>
        &emsp;&emsp;&emsp;&emsp;5<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe5" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe5" rows="3" cols="50" wrap="hard"><?php echo $recipe5?></textarea><br>
        <?php 
        }
        if ($recipe6 != ""){
        ?>
        &emsp;&emsp;&emsp;&emsp;6<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe6" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe6" rows="3" cols="50" wrap="hard"><?php echo $recipe6?></textarea><br>
        <?php 
        }
        if ($recipe7 != ""){
        ?>
        &emsp;&emsp;&emsp;&emsp;7<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe7" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe7" rows="3" cols="50" wrap="hard"><?php echo $recipe7?></textarea><br>
        <?php 
        }
        if ($recipe8 != ""){
        ?>
        &emsp;&emsp;&emsp;&emsp;8<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe8" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe8" rows="3" cols="50" wrap="hard"><?php echo $recipe8?></textarea><br>
        <?php 
        }
        if ($recipe9 != ""){
        ?>
        &emsp;&emsp;&emsp;&emsp;9<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe9" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe9" rows="3" cols="50" wrap="hard"><?php echo $recipe9?></textarea><br>
        <?php 
        }
        if ($recipe10 != ""){
        ?>
        &emsp;&emsp;&emsp;&emsp;10<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe10" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe10" rows="3" cols="50" wrap="hard"><?php echo $recipe10?></textarea><br>
        <?php 
        }
        if ($memo != ""){
        ?>
        その他メモ<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea name="memo" style="border:0;background-color:transparent;color:#660000;" readonly id="memo" rows="5" cols="50" wrap="hard"><?php echo $memo?></textarea><br></p>
        <br>
        <?php 
        }
        ?>
        <p class="txt">
        &emsp;&emsp;&emsp;&emsp;&emsp;
        <a href="list.php">戻る</a>
        </p>
        <a href="pre_update.php?id=<?php echo $row['id']?>&title=<?php echo $row['title']?>">編集</a>
        &emsp;&emsp;&emsp;&emsp;&emsp;
        <form id="delete_form" name="form1" method ="post" action="delete.php">
        <input type ="hidden" name ="id" value="<?php echo $id?>">
        <input type="submit" value="削除" onclick="Javascript:transition();return false;">
        </form>
        <hr width="500">
    </div>
    </body>
</body>
</html>