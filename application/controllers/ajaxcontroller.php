<?php

class AjaxController extends Controller{

	protected $postObject;
    protected $userObject;
    protected $categoryObject;


	public function index(){
		$this->set("response","Invalid Request");
	}

    public function get_post_content() {

        $this->postObject = new Post();
        $post = $this->postObject->getPost($_GET['pID']);
        $this->set('response',$post['content']);


    }

		public function get_comments() {

        $this->postObject = new Post();
        $post = $this->postObject->getComments($_GET['pID']);
        $this->set('response',$post);


    }
		public function getip(){
			
			$xurl = "http://freegeoip.net/xml/".$_POST['ip'];
			$xml = simplexml_load_file($xurl);
			$this->set('data',$xml);
		}

}

?>
