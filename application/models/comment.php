<?php
class Comment extends Model{

    function getComments($pID){
        $sql = 'select * from comments where postID = ?';

        $results = $this->db->getrow($sql, array($pID));

        $post = $results;

        return $post;

    }

    public function addComment($data){

        $sql='INSERT INTO comments (commentText,date,postID,uID) VALUES (?,?,?,?)';
        $this->db->execute($sql,$data);
        $message = 'Comment added.';
        return $message;

    }

    public function deleteComment($commentID) {

        $sql = 'DELETE FROM comments WHERE commentID = ?';
        $this->db->execute($sql, $commentID);
        $message = "comment deleted.";
        return $message;
    }
}
