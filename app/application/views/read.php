<!DOCTYPE html>
<html lang="ja">
<?php
        //ヘッダー内容の確認
        foreach ($result as $row) :
            $title = $row['title'];
            $amount = $row['amount'];
            $ingredients = $row['ingredients'];
            $memo = $row['memo'];
            $picture = $row['picture'];            
//            $inserted_date = $row['inserted_date'];
//            $updated_date = $row['updated_date'];
        endforeach;
        //ディテール内容の確認
        foreach ($result_detail as $row2) :
            $recipe[] = $row2['step'];
        endforeach;
//        echo $recipe[1];
//        print_r($recipe);
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
    <body background="../img/back.gif" text="#660000">
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
        <img src="../img/title.jpg" width="500" alt="title">
        <br><br>
        <hr width="500">
        <a href="http://192.168.33.10/Recipe/index">トップ</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
　      <a href="http://192.168.33.10/Recipe/list">記事一覧</a><br>
        <hr width="500">
        <p class="txt">
        <!--タイトル-->
        <img src="../img/kitchen3.jpg" width="200" alt="kitchen" align="middle">
        <br><br>
        <input type="text" style="border:0;background-color:transparent;color:#660000;font-size:25px;" readonly value="<?php echo $title?>" name="title" id="title" size="48"><br><br>
        <?php if ($picture != ""){ ?>
<!--        <img src="http://192.168.33.10/files/<?php echo $picture?>" alt="picture" title="picture" width="300" height="200"><br>-->
            <img src="../img/<?php echo $picture?>" alt="picture" title="<?php echo $picture?>" width="300"><br>
        <?php } ?>
        材料(<input type="text" style="border:0;background-color:transparent;color:#660000;" readonly value="<?php echo $amount?>" name="amount" id="amount" size="3+">)人分<br>
        &emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="ingredients" style="border:0;background-color:transparent;color:#660000;" readonly id="ingredients" rows="5" cols="50" wrap="hard"><?php echo $ingredients?></textarea><br>
        
        レシピ<br>
        &emsp;&emsp;&emsp;&emsp;1<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe1" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe1" rows="3" cols="50" wrap="hard"><?php echo $recipe[0]?></textarea><br>
        <?php 
        if (isset($recipe[1])){
        ?>
        &emsp;&emsp;&emsp;&emsp;2<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe2" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe2" rows="3" cols="50" wrap="hard"><?php echo $recipe[1]?></textarea><br>
        <?php 
        }
        if (isset($recipe[2])){
        ?>
        &emsp;&emsp;&emsp;&emsp;3<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe3" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe3" rows="3" cols="50" wrap="hard"><?php echo $recipe[2]?></textarea><br>
        <?php 
        }
        if (isset($recipe[3])){
        ?>
        &emsp;&emsp;&emsp;&emsp;4<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe4" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe4" rows="3" cols="50" wrap="hard"><?php echo $recipe[3]?></textarea><br>
        <?php 
        }
        if (isset($recipe[4])){
        ?>
        &emsp;&emsp;&emsp;&emsp;5<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe5" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe5" rows="3" cols="50" wrap="hard"><?php echo $recipe[4]?></textarea><br>
        <?php 
        }
        if (isset($recipe[5])){
        ?>
        &emsp;&emsp;&emsp;&emsp;6<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe6" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe6" rows="3" cols="50" wrap="hard"><?php echo $recipe[5]?></textarea><br>
        <?php 
        }
        if (isset($recipe[6])){
        ?>
        &emsp;&emsp;&emsp;&emsp;7<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe7" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe7" rows="3" cols="50" wrap="hard"><?php echo $recipe[6]?></textarea><br>
        <?php 
        }
        if (isset($recipe[7])){
        ?>
        &emsp;&emsp;&emsp;&emsp;8<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe8" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe8" rows="3" cols="50" wrap="hard"><?php echo $recipe[7]?></textarea><br>
        <?php 
        }
        if (isset($recipe[8])){
        ?>
        &emsp;&emsp;&emsp;&emsp;9<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe9" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe9" rows="3" cols="50" wrap="hard"><?php echo $recipe[8]?></textarea><br>
        <?php 
        }
        if (isset($recipe[9])){
        ?>
        &emsp;&emsp;&emsp;&emsp;10<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe10" style="border:0;background-color:transparent;color:#660000;" readonly id="recipe10" rows="3" cols="50" wrap="hard"><?php echo $recipe[9]?></textarea><br>
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
        <a href="http://192.168.33.10/Recipe/list">戻る</a>
        </p>
        <a href="pre_update.php?id=<?php echo $row['id']?>&title=<?php echo $row['title']?>">編集</a>
        &emsp;&emsp;&emsp;&emsp;&emsp;
        <form id="delete_form" name="form1" method ="post" action="delete.php">
<!--        <input type ="hidden" name ="id" value="<?php echo $id?>">-->
        <input type="submit" value="削除" onclick="Javascript:transition();return false;">
        </form>
        <hr width="500">
    </div>
    </body>
</body>
</html>