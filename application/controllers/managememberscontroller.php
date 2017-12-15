<?php

class ManagemembersController extends Controller{

	public $userObject;
	protected $access = "1";

	public function index(){
        $this->userObject = new Users();
		$users = $this->userObject->getAllUsers();
		$this->set('title', 'The Members View');
		$this->set('users',$users);
		//$this->set('first_name',$first_name);
		//$this->set('last_name',$last_name);
		//$this->set('email',$email);
		//$this->set('active',$active);
		//$this->set('email',$user_type);
	}

	public function activate($uID){
	$this->userObject = new Users();
	$result = $this->userObject->activateUser($uID);
	$this->set('message', $result);
}

public function delete($uID){
	$this->userObject = new Users();
	$result = $this->userObject->removeUser($uID);
	$this->set('message', $result);

}
}

?>
