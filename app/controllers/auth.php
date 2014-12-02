<?php namespace controllers;
use \core\view,
	\helpers\session,
	\helpers\password,
	\helpers\url;

/*
 * Auth controller
 *
 * @version 0.1
 * @date 28.11.2014
 */
 
class Auth extends \core\controller {

	private $_model;
	
	public function __construct(){
		$this->_model = new \models\auth();
	}

	/**
	 * define page title and load template files
	 */
	public function login() {
	
		//echo Password::make('admin');
		
		if(Session::get('loggedin')){
			Url::redirect();
		}		
	
		if(isset($_POST['submit'])){
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			//validation
			if(Password::verify($password, $this->_model->getHash($username)) == false) {
				$error[] = 'Wrong username or password';
			}
			
			//if validation has passed carry on
			if(!$error){
				
				Session::set('loggedin',true);
				Session::set('user_id',$this->_model->getID($username));
				
				$data = array('last_login' => date('Y-m-d G:i:s'));
				$where = array('id' => $this->_model->getID($username));
				$this->_model->update($data,$where);
				
				Url::redirect();
			}
		}
	
		$data['title'] = 'Login';
		View::rendertemplate('header', $data);
		View::render('auth/login', $data, $error);
		View::rendertemplate('footer', $data);
	}
	
	public function logout(){
		Session::destroy();
		Url::redirect();
	}	

}
