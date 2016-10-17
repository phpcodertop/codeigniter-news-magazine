<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('adminModel');
	}

	public function load_view($view,$data)
	{
		$this->load->view('site/header');
		$this->load->view($view,$data);
		$this->load->view('site/footer');
	}
	
	public function index()
	{
        $data['newsforslider'] = $this->adminModel->getnewsbylimit(5);
        $data['latestnews'] = $this->adminModel->getnewsbylimit(6);
        $data['newsforsliderside'] = $this->adminModel->getnewsbylimit(3);
        $data['catsc'] = $this->adminModel->getcatbylimit(4);
        $data['mostread'] = $this->adminModel->getmostreadnewsbylimit(6);
		$data['videos'] = $this->adminModel->getlatestvideosbylimit(3);
		$this->load_view('site/main',$data);	
	}

	public function login()
    {
    	if($this->session->userdata('logged_in') == true){
        	redirect('admin/index');
        }
    	$this->form_validation->set_rules('username', 'User Name', 'trim|required');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required');
    	if ($this->form_validation->run() == FALSE) {
    		$this->load->view('login');
    	} else {
    		$username = $this->input->post('username');
    		$password = md5($this->input->post('password'));
    		if($this->adminModel->login($username,$password) == 1){
    			//success
    			$user_id = $this->adminModel->getuserid($username)->id;
    			$userdata = array(
				        'username'  => $username,
				        'user_id'     => $user_id,
				        'logged_in' => TRUE
				);
				$this->session->set_userdata($userdata);
    			redirect('admin/');
    		}else{
    			//error
    			$this->session->set_flashdata('error', 'Error in Username or Password');
    			$this->load->view('login');
    		}

    	}
    	
    }

    public function category($catid)
    {
        $num = $this->adminModel->cat_exist($catid);
        if($num == 0){
            show_404();
        }
        $this->load->library('pagination');
        $config['base_url'] = base_url().'home/category/'.$catid;
        $config['total_rows'] = $this->adminModel->numcat_news($catid);
        $data['total_rows'] = $this->adminModel->numcat_news($catid);
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(4);
        $data['cat'] = $this->adminModel->getcatwhere($catid);
        $data['mostreadnews'] = $this->adminModel->getmostreadnewsbylimit(6);
        $data['catnews'] = $this->adminModel->getcatnews($catid,$config['per_page'],$page);
        $this->load_view('site/category',$data);
    }

    public function page($pageid)
    {
        $num = $this->adminModel->page_exist($pageid);
        if($num == 0){
            show_404();
        }
        $data['pagecontent'] = $this->adminModel->getpagewhere($pageid);
        $data['mostreadnews'] = $this->adminModel->getmostreadnewsbylimit(6);
        $this->load_view('site/page',$data);
    }

    public function news($newsid)
    {
        $num = $this->adminModel->news_exist($newsid);
        if($num == 0){
            show_404();
        }
        $nn = $this->adminModel->getnewsbyid($newsid);
        $this->adminModel->updatenewsvisits($newsid);
        $data['mostreadnews'] = $this->adminModel->getmostreadnewsbylimit(6);
        $data['relatednews'] = $this->adminModel->getrelatednews($nn->title,$newsid);
        $this->form_validation->set_rules('postername', 'Name', 'required');
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        $this->form_validation->set_message('xss_clean', 'The %s field can not contain these xss attack words');
        if ($this->form_validation->run() ==  FALSE) {
            $data['news'] = $this->adminModel->getnewsbyid($newsid);
            $n = $this->adminModel->getnewsbyid($newsid);
            $n_userid = $n->user_id;
            $n_cat_id = $n->cat_id;
            $data['username'] = $this->adminModel->getuserwhere($n_userid)->username;
            $data['cat'] = $this->adminModel->getcatwhere($n_cat_id)->title;
            $data['comments'] = $this->adminModel->getcommentswhere($newsid);
            $data['commentsnum'] = $this->adminModel->getcommentsnumwhere($newsid);
            $this->load_view('site/news',$data);
        } else {
            $insert = array(
                'news_id' => $this->uri->segment(3),
                'poster_name' => strip_tags($this->input->post('postername')),
                'comment' => strip_tags($this->input->post('comment'))
                );
            if($this->adminModel->addcomment($insert)){
                $data['news'] = $this->adminModel->getnewsbyid($newsid);
                $n = $this->adminModel->getnewsbyid($newsid);
                $n_userid = $n->user_id;
                $n_cat_id = $n->cat_id;
                $data['username'] = $this->adminModel->getuserwhere($n_userid)->username;
                $data['cat'] = $this->adminModel->getcatwhere($n_cat_id)->title;
                $data['comments'] = $this->adminModel->getcommentswhere($newsid);
                $data['commentsnum'] = $this->adminModel->getcommentsnumwhere($newsid);
                $this->load_view('site/news',$data); 
            }
        }


        
    }

    public function search()
        {
            $this->form_validation->set_rules('search', 'Search', 'required|xss_clean');
            $this->form_validation->set_message('xss_clean', 'The %s field can not contain these xss attack words');
            if ($this->form_validation->run() ==  true) {
               
            } else {
                $search = $this->input->post('search');
                $data['search'] = $this->adminModel->search($search);
                $data['searchnum'] = $this->adminModel->searchnum($search);
                $data['mostreadnews'] = $this->adminModel->getmostreadnewsbylimit(6);
                $this->load_view('site/search',$data);
            }

        }


}
