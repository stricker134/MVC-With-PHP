<?php

class MembersController extends Controller{

	public $userObject;

   	public function users($uID){
        $this->userObject = new Users();
		$user = $this->userObject->getUser($uID);
	  	$this->set('user',$user);
   	}

	public function index(){
        $this->userObject = new Users();
		$users = $this->userObject->getAllUsers();
		$this->set('title', 'The Members View');
		$this->set('users',$users);
		$this->set('first_name',$first_name);
		$this->set('last_name',$last_name);
		$this->set('email',$email);
	}
	public function profile($uID){
		$this->userObject = new Users();
		$user = $this->userObject->getUser($uID);
		$this->set('user',$user);
		$this->set('title','Edit Your Profile');
	}
	public function edit(){
		$this->userObject = new Users();
		$this->set('title','You Edited Your Profile');
		if($_POST['password']){
        $password = $_POST['password'];
        $passhash = password_hash($password,PASSWORD_DEFAULT);

		$data = array('email'=>$_POST['email'],'password'=>$passhash,'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'uID'=>$_POST['uID']);

		$message = $this->userObject->editUser($data);
		$this->set('message', $message);
	}
	else{
		$data = array('email'=>$_POST['email'],'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'uID'=>$_POST['uID']);

		$message = $this->userObject->editUserNoPass($data);

		$this->set('message', $message);
	}
	}

}

?>
