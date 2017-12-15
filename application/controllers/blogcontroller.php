<?php

class BlogController extends Controller{

	public $postObject;

   	public function post($pID){
        $this->postObject = new Post();
		$post = $this->postObject->getPost($pID);
		$comments = $this->postObject->getComments($pID);
	  	$this->set('post',$post);
			$this->set('comments',$comments);

   	}

		public function addComment($pID){
			$this->postObject = new Post();
			$post = $this->postObject->getPost($pID);
			$comments = $this->postObject->getComments($pID);
			$dateNow = date("m/d/Y");
			$data = array('commentText'=>$_POST['comment'],'date'=>$_POST['date'],'postID'=>$_POST['pID'],'uID'=>$_POST['uID']);
			$this->commentObject = new Comment;
			$outcome = $this->commentObject->addComment($data);

			if(isset($outcome) and !empty($outcome)){
				$this->set('message','Comment added.');
			}
			else{
				$this->set('message','Comment add failed.');
			}

			$outcome = $this->postObject->getComments($pID);
			$this->set('post',$post);
			$this->set('comments',$outcome);
			header("Location: ". BASE_URL ."blog/post/".$pID);
		}

		public function deleteComment($commentID){
			$data = array('commentID'=>$commentID);
			$this->commentObject = new Comment;
			$outcome = $this->commentObject->deleteComment($data);

			if(isset($outcome) and !empty($outcome)){
				$this->set('message','Comment deleted.');
			}
			else{
				$this->set('message','Comment delete failed.');
			}
		}

		public function category($categoryId){
			$this->postObject = new Post();
			$posts = $this->postObject->getCatPosts($categoryId);
			$this->set('title', 'The Default Blog View');
			$this->set('posts',$posts);
		}


	public function index(){
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);
	}




}

?>
