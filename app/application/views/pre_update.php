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
        endforeach;

        //ディテール内容の確認
        foreach ($result_detail as $row2) :
            $recipe[] = $row2['step'];
        endforeach;        
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
        .txt_1 {
            display: inline-block;
            text-align: right;
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
        <form id="update_form" name="form1" method ="post" action="update.php">
        <!--<input type="hidden" value="<?php echo $id?>" name="id">-->
        <p class="txt">
        タイトル&emsp;<input type="text" value="<?php echo $title?>" name="title" id="title" size="48"><br><br>
        材料(<input type="text" value="<?php echo $amount?>" name="amount" id="amount" size="3+">)人分<br>
        &emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="ingredients" id="ingredients" rows="5" cols="50" wrap="hard"><?php echo $ingredients?></textarea><br>
        
        レシピ<br>
        &emsp;&emsp;&emsp;&emsp;1<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea  name="recipe1" id="recipe1" rows="3" cols="50" wrap="hard"><?php echo $recipe[0]?></textarea><br>
        <?php 
        if (isset($recipe[1])){
        ?>
            &emsp;&emsp;&emsp;&emsp;2<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe2" id="recipe2" rows="3" cols="50" wrap="hard"><?php echo $recipe[1]?></textarea><br>
        <?php 
        }else{
        ?>
            &emsp;&emsp;&emsp;&emsp;2<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe2" id="recipe2" rows="3" cols="50" wrap="hard"></textarea><br>
        <?php    
        }
        if (isset($recipe[2])){
        ?>
            &emsp;&emsp;&emsp;&emsp;3<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe3" id="recipe3" rows="3" cols="50" wrap="hard"><?php echo $recipe[2]?></textarea><br>
        <?php 
        }else{
        ?>
            &emsp;&emsp;&emsp;&emsp;3<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe3" id="recipe2" rows="3" cols="50" wrap="hard"></textarea><br>
        <?php    
        }            
        if (isset($recipe[3])){
        ?>        
            &emsp;&emsp;&emsp;&emsp;4<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe4" id="recipe4" rows="3" cols="50" wrap="hard"><?php echo $recipe[3]?></textarea><br>
        <?php 
        }else{
        ?>
            &emsp;&emsp;&emsp;&emsp;4<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe4" id="recipe4" rows="3" cols="50" wrap="hard"></textarea><br>
        <?php    
        }
        if (isset($recipe[4])){
        ?>
            &emsp;&emsp;&emsp;&emsp;5<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe5" id="recipe5" rows="3" cols="50" wrap="hard"><?php echo $recipe[4]?></textarea><br>
        <?php 
        }else{
        ?>
            &emsp;&emsp;&emsp;&emsp;5<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe5" id="recipe5" rows="3" cols="50" wrap="hard"></textarea><br>
        <?php    
        }
        if (isset($recipe[5])){
        ?>        
            &emsp;&emsp;&emsp;&emsp;6<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe6" id="recipe6" rows="3" cols="50" wrap="hard"><?php echo $recipe[5]?></textarea><br>
        <?php 
        }else{
        ?>{
            &emsp;&emsp;&emsp;&emsp;6<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe6" id="recipe6" rows="3" cols="50" wrap="hard"></textarea><br>
        <?php    
        }
        if (isset($recipe[6])){
        ?>        
            &emsp;&emsp;&emsp;&emsp;7<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe7" id="recipe7" rows="3" cols="50" wrap="hard"><?php echo $recipe[6]?></textarea><br>
        <?php 
        }else{
        ?>
            &emsp;&emsp;&emsp;&emsp;7<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe7" id="recipe7" rows="3" cols="50" wrap="hard"></textarea><br>
        <?php     
        }
        if (isset($recipe[7])){
        ?>
            &emsp;&emsp;&emsp;&emsp;8<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe8" id="recipe8" rows="3" cols="50" wrap="hard"><?php echo $recipe[7]?></textarea><br>
        <?php 
        }else{            
        ?>
            &emsp;&emsp;&emsp;&emsp;8<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe8" id="recipe8" rows="3" cols="50" wrap="hard"></textarea><br>    
        <?php
        }
        if (isset($recipe[8])){
        ?>
            &emsp;&emsp;&emsp;&emsp;9<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe9" id="recipe9" rows="3" cols="50" wrap="hard"><?php echo $recipe[8]?></textarea><br>
        <?php 
        }else{
        ?>
            &emsp;&emsp;&emsp;&emsp;9<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe9" id="recipe9" rows="3" cols="50" wrap="hard"></textarea><br>
        <?php    
        }
        if (isset($recipe[9])){
        ?>
            &emsp;&emsp;&emsp;&emsp;10<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe10" id="recipe10" rows="3" cols="50" wrap="hard"><?php echo $recipe[9]?></textarea><br>
        <?php 
        }else{
        ?>
            &emsp;&emsp;&emsp;&emsp;10<br>&emsp;&emsp;&emsp;&emsp;&emsp;
            <textarea value="" name="recipe10" id="recipe10" rows="3" cols="50" wrap="hard"></textarea><br>
        <?php    
        }
        ?> 
        その他メモ<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <?php    
        if (isset($memo)){
        ?>
        <textarea name="memo" id="memo" rows="5" cols="50" wrap="hard"><?php echo $memo?></textarea><br>
        <?php    
        }else{
        ?>
        <textarea name="memo" id="memo" rows="5" cols="50" wrap="hard"></textarea><br>
        <?php    
        }
        ?>                
        <br>
        &emsp;&emsp;<a href="http://192.168.33.10/Recipe/list">戻る</a></p>
        <div class="wrapper">
        <input type="submit" value="更新" onclick="Javascript:transition();return false;">
        </form>
        </div>
        <hr width="500">
    </div>
    </body>
</body>
</html>