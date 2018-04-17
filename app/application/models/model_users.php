<?php

class model_users extends CI_Model {

    public  function insert_into_user(){
        $data = array(	//以下、2つのデータを取得して、$dataに紐づける
            "username" => "root",
            "password" => "nao"
        );
        $this->db->insert("users", $data);
    }

}
