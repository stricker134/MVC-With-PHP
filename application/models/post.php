<?php
class Post extends Model{

    function getPost($pID){
        $sql = 'SELECT p.pID, p.title, p.content, p.uid, p.categoryid, p.date, c.name as name, u.first_name, u.last_name FROM posts p
		INNER JOIN categories c on c.categoryid = p.categoryid
		INNER JOIN users u on u.uid = p.uid
		WHERE p.pID = ?
		';
        $results = $this->db->getrow($sql, array($pID));

        $post = $results;

        return $post;

    }

    public function getUserPosts($uID){

        $sql = 'select * from posts where uID = ?';

        $results = $this->db->execute($sql, $uID);

        while ($row=$results->fetchrow()) {
            $posts[] = $row;
        }

        return $posts;
    }

    public function getCatPosts($cID){

      $sql =  'SELECT p.pID, p.title, p.content, p.uid, p.categoryid, p.date, c.name as name, u.first_name, u.last_name FROM posts p
  INNER JOIN categories c on c.categoryid = p.categoryid
  INNER JOIN users u on u.uid = p.uid
  WHERE p.categoryID = ?';

        $results = $this->db->execute($sql, $cID);

        while ($row=$results->fetchrow()) {
            $posts[] = $row;
        }

        return $posts;
    }

    public function getAllPosts($limit = 0){

        if($limit > 0){

            $numposts = ' LIMIT '.$limit;
        }

        $sql =  'SELECT p.pID, p.title, p.content, p.uid, p.categoryid, p.date, c.name as name, u.first_name, u.last_name FROM posts p
		INNER JOIN categories c on c.categoryid = p.categoryid
		INNER JOIN users u on u.uid = p.uid'.$numposts;

        // perform query
        $results = $this->db->execute($sql);

        while ($row=$results->fetchrow()) {
            $posts[] = $row;
        }

        return $posts;

    }

    public function addPost($data){

        $sql='INSERT INTO posts (title,content,categoryID,date,uID) VALUES (?,?,?,?,?)';
        $this->db->execute($sql,$data);
        $message = 'Post added.';
        return $message;

    }

    public function deletePost($pID){

        $sql='DELETE FROM posts WHERE pID = ?';
        $this->db->execute($sql,$pID);
        $message = 'Post deleted.';
        return $message;

    }

    public function updatePost($data) {

        $sql = 'UPDATE posts SET title = ?, content = ?, categoryID = ?, date = ? where pID = ?';
        $this->db->execute($sql, $data);
        $message = "Post updated.";
        return $message;
    }

    function getComments($pID){
      $sql = 'SELECT c.commentText, c.date, u.first_name, u.last_name, c.commentID FROM comments c
      INNER JOIN users u
      ON c.uID = u.uID where postID = ?';

      $results = $this->db->execute($sql, $pID);

      while ($row=$results->fetchrow()) {
          $comments[] = $row;
      }

      return $comments;
    }

    public function addComment($data){

        $sql='INSERT INTO comments (commentID,commentText,date,postID,uID) VALUES (?,?,?,?,1)';
        $this->db->execute($sql,$data);
        $message = 'Comment added.';
        return $message;

    }

    public function deleteComment($pID) {

        $sql = 'DELETE FROM comments WHERE pID = ?';
        $this->db->execute($sql, $data);
        $message = "comment deleted.";
        return $message;
    }
}
