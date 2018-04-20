<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
</head> 
<script type="text/javascript">
     //画像アップロード処理
     function file_upload()
     {
        // フォームデータを取得
        var formdata = new FormData(document.getElementById("my_form"));
        
        // XMLHttpRequestによるアップロード処理
        var xhttpreq = new XMLHttpRequest();
        xhttpreq.onreadystatechange = function() 
        {
            if (xhttpreq.readyState == 4 && xhttpreq.status == 200) 
            {
                alert(xhttpreq.responseText);
            }
        }
        xhttpreq.open("POST", "upload.php", true);
        xhttpreq.send(formdata);
     }

    function chk_data() 
    {
        var filename = document.getElementById("uploadfile").value;

        //文字を置換する
        filename = filename.replace("C:\\fakepath\\","");

        var ele = document.createElement('input');

        document.getElementById("filename").value = filename;
    
        //入力チェック
        var formdata = new FormData(document.getElementById("my_form"));

        if (document.getElementById('title').value == "" )
        {
            alert('タイトルが未入力です。');
            return false;
        }
        else if(document.getElementById('amount').value == "" )
        {
            alert('分量(何人分)が未入力です。');
            return false;
        }
        else if(document.getElementById('amount').value.match(/[^0-9]+/))
        {
            alert('分量(何人分)は数値を入力してください。');
            return false;
        }
        else if(document.getElementById('ingredients').value == "" )
        {
            alert('材料が未入力です。');
            return false;
        }
        else if(document.getElementById('recipe1').value == "" )
        {
            alert('レシピが未入力です。');
            return false;
        }
        else
        {
            if(window.confirm('登録してもよろしいですか？'))
            {
                transition();   
                //return true;
            }
        }
    }

    //登録ページ遷移処理
    function transition()
    {
        var filename = document.getElementById("uploadfile").value;

        //文字を置換する
        filename = filename.replace("C:\\fakepath\\","");
        
        var ele = document.createElement('input');

        document.getElementById("filename").value = filename;
            
        //入力チェック
        var formdata = new FormData(document.getElementById("my_form"));
        
        formdata.appendChild(filename);
        
        // 「OK」時の処理 ＋ 確認ダイアログの表示
        xhttpreq.open("POST", "insert.php", true);
        xhttpreq.send(formdata);
        return true;
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
    </style>
        <div class="wrapper">
        <img src="../img/title.jpg" width="500" alt="title">
        <br><br>
 
<form id="my_form" name="form1" method ="post" action="insert.php">
<!--<form id="my_form" name="form1" method ="post">-->
        <hr width="500">
        <a href="http://192.168.33.10/Recipe/index">トップ</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
　      <a href="http://192.168.33.10/Recipe/list">記事一覧</a><br>
        <hr width="500">
        <p class="txt">
        <font size="1">※タイトル、分量(何人分)、材料、レシピは必須項目です。</font><br>          
        タイトル&emsp;<!--<input type="text" value="" name="title" id="title" size="48">-->
        <textarea value="" name="title" id="title" rows="1" cols="50" wrap="hard"></textarea>
        <br><br>
        <!--材料(<input type="text" value="" name="amount" id="amount" size="3">)人分<br>-->
        材料(<textarea value="" name="amount" id="amount" rows="1" cols="4" wrap="hard"></textarea>)人分<br>
        &emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="ingredients" id="ingredients" rows="5" cols="50" wrap="hard"></textarea><br>
        レシピ<br>
        &emsp;&emsp;&emsp;&emsp;1<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe1" id="recipe1" rows="3" cols="50" wrap="hard"></textarea><br>
        &emsp;&emsp;&emsp;&emsp;2<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe2" id="recipe2" rows="3" cols="50" wrap="hard"></textarea><br>
        &emsp;&emsp;&emsp;&emsp;3<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe3" id="recipe3" rows="3" cols="50" wrap="hard"></textarea><br>
        &emsp;&emsp;&emsp;&emsp;4<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe4" id="recipe4" rows="3" cols="50" wrap="hard"></textarea><br>
        &emsp;&emsp;&emsp;&emsp;5<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe5" id="recipe5" rows="3" cols="50" wrap="hard"></textarea><br>
        &emsp;&emsp;&emsp;&emsp;6<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe6" id="recipe6" rows="3" cols="50" wrap="hard"></textarea><br>
        &emsp;&emsp;&emsp;&emsp;7<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe7" id="recipe7" rows="3" cols="50" wrap="hard"></textarea><br>
        &emsp;&emsp;&emsp;&emsp;8<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe8" id="recipe8" rows="3" cols="50" wrap="hard"></textarea><br>
        &emsp;&emsp;&emsp;&emsp;9<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe9" id="recipe9" rows="3" cols="50" wrap="hard"></textarea><br>
        &emsp;&emsp;&emsp;&emsp;10<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="recipe10" id="recipe10" rows="3" cols="50" wrap="hard"></textarea><br>
        その他メモ<br>&emsp;&emsp;&emsp;&emsp;&emsp;
        <textarea value="" name="memo" id="memo" rows="5" cols="50" wrap="hard"></textarea><br></p>
        
        <p class="txt">
        写真選択&emsp;
        <input type="file" name="file_1" id="uploadfile">
        <button type="button" onclick="file_upload()">アップロード</button></p>
        <input type="hidden" name="filename" id="filename" value="">
        <br>
        <input type="submit" value="登録" onclick="Javascript:chk_data();return false;">
        <hr width="500">
        </form>
    </div>
    </body>
</body>
</html>