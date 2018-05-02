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
        //表示内容select取得クエリ
        $query = $this->db->query('select*from recipe_header where id =' .$this->db->escape_str($id));
        //select結果を配列として返す
        return $query->result_array();
    }

    public  function read_select_detail($id){
        //表示内容select取得クエリ
        $query = $this->db->query('select step from recipe_detail where id =' .$this->db->escape_str($id).' order by number');
        //select結果を配列として返す
        return $query->result_array();
    }

    public  function delete_header($id){
        //header削除クエリ
        $query = $this->db->query('delete from recipe_header where id =' .$this->db->escape_str($id));
    }

    public  function delete_detail($id){
        //detail削除クエリ
        $query = $this->db->query('delete from recipe_detail where id =' .$this->db->escape_str($id));
    }

    public  function select_id(){
        //selectクエリ
        $query = $this->db->query('select max(id)+1 as maxid from recipe_header');
        //select結果を配列として返す
        error_log(print_r($query, true).date('Y/m/d H:i:s'), 3, "/app/log/query_debug.log");
        return $query->row_array();
    }
    
    public  function insert_header($inputdata){
        $maxid = $inputdata['maxid'];
        $test = $inputdata['test'];
        error_log(print_r($maxid, true).date('Y/m/d H:i:s'), 3, "/app/log/id1.log");
        error_log(print_r($test, true).date('Y/m/d H:i:s'), 3, "/app/log/id2.log"); 
        error_log(print_r($inputdata, true).date('Y/m/d H:i:s'), 3, "/app/log/id3.log"); 
        
        //insertクエリ
        $data_header = array(
        'id' => $maxid,
        'title' => 'うどん' ,
        'amount' => '2',
        'ingredients' => '出汁、うどん',
        'memo' => 'うどん',
        'picture' => 'うどん',
        'inserted_date' => 'now()',
        'updated_date' => 'now()'
         );
        $this->db->insert('recipe_header', $data_header);
    }

    public  function insert_detail(){
        //insertクエリ
        $query = $this->db->query('insert into recipe_detail (id,number,step,inserted_date,updated_date)
		values(:id,:number,:step,now(),now())');
    }
}