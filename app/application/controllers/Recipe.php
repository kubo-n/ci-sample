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

	//【topページ】
	public function index()
	{
		$this->load->view('top');
	}

	//【listページ】
	public function list()
	{
		//モデル接続
		$this->load->model("model_users");
		//$this->model_users->__construct();
		//title取得クエリ結果取得(↓の記述で,モデルのtitle_selectの結果が取得できる)
		$data['result'] = $this->model_users->title_select();
		//情報受渡し
		$this->load->view('list',$data);
	}

	//【readページ】
	public function read()
	{
		$id = $_GET['id'];
		//echo $id;

		//モデル接続
		$this->load->model("model_users");
		$this->model_users->read_select_header($id);
		$this->model_users->read_select_detail($id);
		
		//表示内容select取得クエリ結果取得
		$data['result'] = $this->model_users->read_select_header($id);
		$data_detail['result_detail'] = $this->model_users->read_select_detail($id);
		//情報受渡し
		$this->load->view('read',$data,$data_detail,$id);
	}

	public function get($title)
	{
		$this->load->model('welcome_model');

		$data['title'] = $this->welcome_model->get();;
		$this->load->view('welcome_message', $data);
	}
}
