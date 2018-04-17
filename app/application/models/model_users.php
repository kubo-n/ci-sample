<?php

class model_users extends CI_Model {

//    public  function insert_into_user(){
//        $data = array(	//以下、2つのデータを取得して、$dataに紐づける
//            "username" => "root",
//            "password" => "nao"
//        );
//       $this->db->insert("users", $data);
//   }
    function __construct() {
        //※コンストラクタでは必ず親クラスを継承する
        parent::__construct();
       
       // DB接続
       $config = array(
           'hostname' => 'localhost',
           'username' => 'root',
           'password' => 'nao',
           'database' => 'recipe',
           'dbdriver' => 'mysql',
       );
       $this->load->database($config);
   }
}
