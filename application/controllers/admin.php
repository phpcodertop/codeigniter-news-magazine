<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('adminModel');
        //check if user is logged in , if not redirect to login page
        if($this->session->userdata('logged_in') == false){
        	redirect('home/login');
        }
    }

    public function logout()
    {
    	$this->session->sess_destroy();
    	redirect('home/login');
    }

    
    public function load_view($view,$data = "")
    {
    	$this->load->view('admin/header');    
    	$this->load->view('admin/sidebar');    
    	$this->load->view($view,$data);    
    	$this->load->view('admin/footer');   
    }

    function index() {
    	$data = array();
    	$this->load_view('admin/content',$data);
    }

   	public function addcat()
   	{
   		$this->form_validation->set_rules('title', 'Category Name', 'required|min_length[3]');
   		$data = array(
   				'title' => $this->input->post('title'),
   				'description' => $this->input->post('description')
   			);
   		if($this->form_validation->run() == false){
   			$this->load_view('admin/addcat');
   		}else{
   			if($this->adminModel->addCat($data)){
   				$this->session->set_flashdata('added','Category added Successfully');
   				$this->load_view('admin/addcat');
   			}
   		}
    	
   	}

    public function managecats()
   	{
   		# here you can manage news categories
   		$data['cats'] = $this->adminModel->getcat();
   		$this->load_view('admin/managecats',$data);

   	}

   	public function editcat()
   	{
   		# code...
   		$cat_id = $this->uri->segment(3);
   		$this->form_validation->set_rules('title', 'Category Name', 'required|min_length[3]');
   		if($this->form_validation->run() == false){
   			$data['catdetails'] = $this->adminModel->getcatwhere($cat_id);
   			$this->load_view('admin/editcat',$data);
   		}else{
   			$data = array(
   				'title' => $this->input->post('title'),
   				'description' => $this->input->post('description')
   			);
   			if($this->adminModel->editcat($cat_id,$data)){
   				$this->session->set_flashdata('edited','Category edited Successfully');
   				$data['catdetails'] = $this->adminModel->getcatwhere($cat_id);
   				$this->load_view('admin/editcat',$data);
   			}
   		}

   		
   	}

   	public function deletecat($cat_id)
   	{
   		# code...
   		if ($this->adminModel->deletecat($cat_id)) {
   			$this->session->set_flashdata('deleted','Category deleted Successfully');
   			redirect('admin/managecats');
   		}
   	}

   	public function adduser()
   	{
   		# code...
   		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[5]');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
   		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[5]|matches[password]');
   		$data = array(
   				'username' => $this->input->post('username'),
   				'password' => md5($this->input->post('password'))
   			);
   		if($this->form_validation->run() == false){
   			$this->load_view('admin/adduser');
   		}else{
   			$username = $this->input->post('username');
   			if($this->adminModel->checkuserexist($username)){
   				$this->session->set_flashdata('exist','Please choose another username');
   				$this->load_view('admin/adduser');
   				
   			}else{
   				if($this->adminModel->adduser($data)){
   				$this->session->set_flashdata('added','User added Successfully');
   				$this->load_view('admin/adduser');
   				}
   			}
   			
   		}
   	}

   	public function manageusers()
   	{
   		$data['users'] = $this->adminModel->getallusers();
   		$this->load_view('admin/manageusers',$data);
   	}

   	public function deleteuser($user_id)
   	{
   		if ($this->adminModel->deleteuser($user_id)) {
   			$this->session->set_flashdata('deleted','User deleted Successfully');
   			redirect('admin/manageusers');
   		}
   	}

   	public function edituser($user_id)
   	{
   		# code...
   		$user_id = $this->uri->segment(3);
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
   		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[5]|matches[password]');
   		if($this->form_validation->run() == false){
   			$data['userdetails'] = $this->adminModel->getuserwhere($user_id);
   			$this->load_view('admin/edituser',$data);
   		}else{	
   				$data = array(
   				'password' => md5($this->input->post('password'))
   				);
   				if($this->adminModel->edituser($user_id,$data)){
	   				$this->session->set_flashdata('edited','User Edited Successfully');
	   				$data['userdetails'] = $this->adminModel->getuserwhere($user_id);
	   				$this->load_view('admin/edituser',$data);
   				}
   		}
   	}

   	public function settings()
   	{
   		# code...
   		$this->form_validation->set_rules('sitemail', 'Site Email', 'valid_email|required');
   		if ($this->form_validation->run() == FALSE) {
   			$data['settings'] = $this->adminModel->getsettings();
   			$this->load_view('admin/settings',$data);
   		}else {
   			$insert = array(
   				'sitename' => $this->input->post('sitename'),
   				'sitemail' => $this->input->post('sitemail'),
   				'description' => $this->input->post('description'),
   				'keywords' => $this->input->post('keywords'),
   				'copyright' => $this->input->post('copyright'),
   				'author' => $this->input->post('author')
   				);
	   			if($this->adminModel->setsettings($insert)){
	   				$this->session->set_flashdata('edited', 'Settings Saved Successfully');
	   				$data['settings'] = $this->adminModel->getsettings();
	   				$this->load_view('admin/settings',$data);
	   			}
   		}
   		
   	}

   	public function addpage()
   	{
   		$this->form_validation->set_rules('pagetitle', 'Page Title', 'required');
   		$this->form_validation->set_rules('pagecontent', 'Page Content', 'required');
   		$data = array(
   				'pagetitle' => $this->input->post('pagetitle'),
   				'pagecontent' => $this->input->post('pagecontent')
   			);
   		if($this->form_validation->run() == false){
   			$this->load_view('admin/addpage');
   		}else{
   			if($this->adminModel->addpage($data)){
   				$this->session->set_flashdata('added','Page added Successfully');
   				$this->load_view('admin/addpage');
   			}
   		}
   	}

   	public function editpage($page_id)
   	{
   		# code...
   		$page_id = $this->uri->segment(3);
   		$this->form_validation->set_rules('pagetitle', 'Page Title', 'required');
   		$this->form_validation->set_rules('pagecontent', 'Page Content', 'required');
   		if($this->form_validation->run() == false){
   			$data['pagedetails'] = $this->adminModel->getpagewhere($page_id);
   			$this->load_view('admin/editpage',$data);
   		}else{
   			$data = array(
   				'pagetitle' => $this->input->post('pagetitle'),
   				'pagecontent' => $this->input->post('pagecontent')
   			);
   			if($this->adminModel->editpage($page_id,$data)){
   				$this->session->set_flashdata('edited','page edited Successfully');
   				$data['pagedetails'] = $this->adminModel->getpagewhere($page_id);
   				$this->load_view('admin/editpage',$data);
   			}
   		}
   	}

   	public function managepages()
   	{
   		$data['pages'] = $this->adminModel->getpages();
   		$this->load_view('admin/managepages',$data);
   	}

   	public function deletepage($page_id)
   	{
   		if ($this->adminModel->deletepage($page_id)) {
   			$this->session->set_flashdata('deleted','Category deleted Successfully');
   			redirect('admin/managepages');
   		}
   	}

   	//news start from here 
   	public function addnews()
   	{
   		$this->form_validation->set_rules('title', 'News Title', 'required');
   		//$this->form_validation->set_rules('image', 'News Image', 'required');
   		if ($this->form_validation->run() ==  FALSE) {
   			# if there an error in validation
   			$data['cats'] = $this->adminModel->getcat();
   			$this->load_view('admin/addnews',$data);
   		} else {
   			# if there is not any errors
   			//upload image 
   			    $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png|PNG';
            $config['max_size']             = 2048;
            $config['max_width'] = '1024';
			      $config['max_height'] = '768';
            $config['overwrite'] = false;
            $config['remove_spaces'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image'))
                {
                    $data['error'] = array('error' => $this->upload->display_errors());
                    $data['cats'] = $this->adminModel->getcat();
   					        $this->load_view('admin/addnews',$data);
                }
                else
                {
                  //if image is uploaded
                  $insert = array(
                  		'title' => $this->input->post('title'),
                  		'content' => $this->input->post('content'),
                  		'user_id' => $this->session->userdata('user_id'),
                  		'cat_id' => $this->input->post('cat_id'),
                  		'image' => $this->upload->data('file_name'),
                  		'youtube_video' => $this->input->post('youtube_video')
                  	);
                  	if($this->adminModel->addnews($insert)){ //if inserting is done
                  		$this->session->set_flashdata('added','News added Successfully');
   						$data['cats'] = $this->adminModel->getcat();
   						$this->load_view('admin/addnews',$data);	
                  	} 

                }

   		}
   		
   	}

   	public function managenews()
   	{
      $this->load->library('pagination');

      $config['base_url'] = base_url('admin/managenews');
      $config['total_rows'] = $this->adminModel->num_news();
      $config['per_page'] = 5;
      $page = $this->uri->segment(3);
      $this->pagination->initialize($config);
   		$data['news'] = $this->adminModel->getnews($config['per_page'],$page);
      $this->load_view('admin/managenews',$data);
   	}

    public function deletenews($newsid)
    {
      if($this->adminModel->deletenews($newsid)){
          $this->session->set_flashdata('deleted','news deleted Successfully');
          redirect('admin/managenews');  
      }
    }

    public function editnews($newsid)
    {
        $this->form_validation->set_rules('title', 'News Title', 'required');
        //$this->form_validation->set_rules('image', 'News Image', 'required');
        if ($this->form_validation->run() ==  FALSE) {
          # if there an error in validation
          $data['cats'] = $this->adminModel->getcat();
          $data['newsdata'] = $this->adminModel->getnewsbyid($newsid);
          $this->load_view('admin/editnews',$data);
        } else {
              $insert = array(
                      'title' => $this->input->post('title'),
                      'content' => $this->input->post('content'),
                      'cat_id' => $this->input->post('cat_id'),
                      'youtube_video' => $this->input->post('youtube_video')
                    );
                    if($this->adminModel->editnews($newsid,$insert)){ //if updating is done
                      $this->session->set_flashdata('edited','News edited Successfully');
                      $data['cats'] = $this->adminModel->getcat();
                      $data['newsdata'] = $this->adminModel->getnewsbyid($newsid);
                      $this->load_view('admin/editnews',$data);
                    }  
        }
    }

    public function ads()
    {
        
              if($this->input->post('save')){

                $arr1 = array('code' => $this->input->post('one'));
                $arr2 = array('code' => $this->input->post('two'));
                if($this->adminModel->editadds(1,$arr1) and $this->adminModel->editadds(2,$arr2)){
                    $this->session->set_flashdata('edited','ADS edited Successfully');  
                    $data['ads1'] = $this->adminModel->getadds(1);
                    $data['ads2'] = $this->adminModel->getadds(2);
                    $this->load_view('admin/adds',$data);
                }
              
              }else{
                  $data['ads1'] = $this->adminModel->getadds(1);
                    $data['ads2'] = $this->adminModel->getadds(2);
                    $this->load_view('admin/adds',$data);  
              }
        
    }


    public function details()
    {
        $this->form_validation->set_rules('fb', 'Facebook Link', 'trim|callback_valid_url_format');
        $this->form_validation->set_rules('tw', 'Twitter Link', 'trim|callback_valid_url_format');
        $this->form_validation->set_rules('ins', 'Instagram Link', 'trim|callback_valid_url_format');
        if ($this->form_validation->run() ==  FALSE) {
                    $data['details'] = $this->adminModel->getdetails();
                    $this->load_view('admin/details',$data);
        } else {
                    $insert = array(
                      'fb' => $this->input->post('fb'),
                      'tw' => $this->input->post('tw'),
                      'ins' => $this->input->post('ins'),
                      'twitterbox' => $this->input->post('twitterbox')
                      );
                    if($this->adminModel->updatedetails($insert)){
                        $this->session->set_flashdata('edited','details saved Successfully');
                        $data['details'] = $this->adminModel->getdetails();
                        $this->load_view('admin/details',$data);
                    }
        }
    }

    function valid_url_format($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->form_validation->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
            return FALSE;
        }
 
        return TRUE;
    }


    ///end admin controller

}
        
?>