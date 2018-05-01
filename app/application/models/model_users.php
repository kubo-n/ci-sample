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
        $query = $this->db->query('select title,id from recipe_header');
        //select結果を配列として返す
        return $query->result_array();
    }
    
    public  function read_select_header($id){
        //echo $id;
        //表示内容select取得クエリ
        $query = $this->db->query('select*from recipe_header where id =' .$this->db->escape_str($id));
        //select結果を配列として返す
        return $query->result_array();
    }

    public  function read_select_detail($id){
        //echo $id;
        //表示内容select取得クエリ
        $query = $this->db->query('select step from recipe_detail where id =' .$this->db->escape_str($id).' order by number');
        //select結果を配列として返す
        return $query->result_array();
    }
}