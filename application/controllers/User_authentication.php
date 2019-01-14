<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		
		// Load facebook library
		$this->load->library('facebook');
		
		//Load user model
		$this->load->model('user');
        $this->load->model('usuariosModel');
    }
    
    public function index(){
		$userData = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture.width(300)');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
			
			// Check user data insert or update status
            if(!empty($userID)){
            	$userData['name'] = $userProfile['first_name'].' '.$userProfile['last_name'];
            	$userData['user_type'] = 1; //0 para entidade 1 para usuario
            	$userData['logged_in'] = TRUE;
            	$userData['url'] = $userProfile['picture']['data']['url'];
                $datas = $this->usuariosModel->return_user_id_facebook($userData['oauth_uid']);
                foreach ($datas as $d) {
                    $userData['id'] = $d->id; 
                }
                $data['userData'] = $userData;
                $this->session->set_userdata($userData);
            } else {
               $data['userData'] = array();
            }
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
            $fbuser = '';
			
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }
		
		// Load login & profile view
        $this->template->load('template','loginEntidadeView',$data);
    }

	public function logout() {
		// Remove local Facebook session
		$this->facebook->destroy_session();
		// Remove user data from session
		$this->session->unset_userdata('userData');
		// Redirect to login page
		$this->session->sess_destroy();
        redirect('/user_authentication');
    }
}
