<?php

class model_users extends CI_Model {

    public function __construct()
    {
        //モデルのコンストラクタでは必ず親クラスを継承する
        parent::__construct();

        // DB接続
        $this->load->database();
    }

    public  function insert_into_user(){
        $data = array(	//以下、2つのデータを取得して、$dataに紐づける
            "username" => "root",
            "password" => "nao"
        );
        $this->db->insert("users", $data);
    }

    public  function title_select(){
        //title取得クエリ
        return $this->db->query('select title,id from recipe_header');
        $data['result'] = $query->result_array();
    }
}