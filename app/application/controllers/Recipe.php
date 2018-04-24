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
		//DB接続
		$this->load->model("model_users");
		//$this->model_users->__construct();
		//title取得クエリ結果取得(↓の記述でモデルのtitle_selectの結果が取得できる)
		$data['result'] = $this->model_users->title_select();
		//情報受渡し
		$this->load->view('list',$data);
	}

	//【readページ】
	public function read()
	{
		//DB接続
		$this->load->model("model_users");
		//表示内容select取得クエリ結果取得
		$data['result'] = $this->model_users->read_select_header();		
		//情報受渡し
		$this->load->view('read',$data);
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
