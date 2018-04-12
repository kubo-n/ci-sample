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
		//ヘッダーからtitleを取得
		$pdo -> beginTransaction();		
		$stmh = $pdo->prepare("select title,id from recipe_header");
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
    <title>記事一覧</title>
</head>
<script type="text/javascript">
   function read()
    {
        var formdata = new FormData(document.getElementById("read_form"))

        //var xhttpreq = new XMLHttpRequest();        
        //xhttpreq.open("POST", "read.php", true);
        //xhttpreq.send(formdata);
        //return true;
        //window.location.href = 'read.php'

        var xhttpreq = new XMLHttpRequest();
        xhttpreq.onreadystatechange = function(){
            
        }
        xhttpreq.open("POST", "read.php", true);
        xhttpreq.send(formdata); 
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
    </style>
     <div class="wrapper">
        <img src="img/title.jpg" width="500" alt="title">
        <br><br>
        <hr width="500">
        <a href="index.html">トップ</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
　      <a href="list.php">記事一覧</a><br>
        <hr width="500">
        <p class="txt">
        <a href="input.php">新規</a>
        <br></p>
        <?php if ($stmh != ''){
              //titleを配列にして表示   
              foreach ($stmh as  $row) : 
        ?>        
        <form id="read_form" name="form1" method ="post" action="read.php">
        <p class="txt">
            <!--<input type="submit" onclick="Javascript:read()"value="<?php echo $row['title']?>">-->
            <a href="read.php?id=<?php echo $row['id']?>&title=<?php echo $row['title']?>"><?php echo $row['title']?></a>
           <!-- <button type="button" onclick="read()">・<?php echo $row['title']?></button>-->
           <!--<input type="hidden" name="title" value="<?php echo $row['title']?>">-->
           <!--<input type="hidden" name="id" value="<?php echo $row['id']?>">-->
           <!--<input type="submit" value="ここ">-->
        </p>
        </form>
        <?php
            endforeach;
        }
        ?>
        <hr width="500">
    </div>
    </body>
</body>
</html>