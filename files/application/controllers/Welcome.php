<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//login
	public function sso_login(){
		$this->load->library('cas');
	    $this->cas->force_auth();
	    $user = $this->cas->user();
	    print_r($user);
		//
		// After logging in successfully, $user will contain an email address that can be used for the login process on the local system
		/*
			stdClass Object
			(
				[userlogin] => abcd@efgh.com
				[attributes] => Array
					(
					)

			)
		*/
	}
	
	//logout
	public function sso_logout(){
		//you can clear the session here (early clearing)
		$this->load->library('cas');
		$this->cas->logout(base_url() . 'sso_after_logout'); //url at logout can't be filled with base_url ()
	}
	
	//landing page after sso_logout.
	//You only need this if you want your user redirected to base_url() but you can't do this directly, because the url at logout cannot be filled with base_url ()
	public function sso_after_logout(){
		//you can clear the session here (late clearing)
		//redirect to base_url();
		redirect();
	}
}
