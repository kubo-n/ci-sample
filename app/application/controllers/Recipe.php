<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	////topページ
	public function index()
	{
		$this->load->view('top');
	}
	////listページ
	public function list()
	{
		//DB接続
		$this->load->model("model_users");
		//title取得''
		$this->model_users->title_select($data);
		//$this->model_users->__construct();
		//title取得''
		//$query = $this->db->query('select title,id from recipe_header');
		//$data['result'] = $query->result_array();

		//情報受渡し
		$this->load->view('list',$data);
//		$this->load->view('list','result');
	}

	////inputページ
	public function input()
	{
		//DB接続
		//$this->load->model("model_users");
		//$this->model_users->__construct();
		//title取得クエリ
		//$query = $this->db->query('select title,id from recipe_header');
		
		//foreach ($query->result_array() as $row)
		//{
    	//      $row['title'];
        //	  $row['id']; 
		//}
		//情報受渡し
		//$this->load->view('list',$query);
		$this->load->view('input');
	}

	public function get($title)
	{
		$this->load->model('welcome_model');

		$data['title'] = $this->welcome_model->get();;
		$this->load->view('welcome_message', $data);
	}

	public function push()
	{
		$data['testkubo'] = 'ごめんなさい';
		$this->load->view('kubokubokubo', $data);
	}
}
