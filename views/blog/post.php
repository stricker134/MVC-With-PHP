
<?php include('views/elements/header.php');?>
<?php
if( is_array($post) ) {
    extract($post);
  }
if( is_array($comments) ) {
    extract($comments);

}?>

    <div class="container">
        <div class="page-header">

            <h1><?php echo $title;?></h1>
        </div>
        <p><?php echo $content;?></p>
        <sub><?php echo 'Posted on ' . $date . ' by <a href="'.BASE_URL.'members/view/'. $uid.'">'. $first_name . ' ' . $last_name . '</a> in <a href="'.BASE_URL.'blog/category/'. $categoryid.'">' . $name .'</a>'; ?>
        </sub>

        <h3> Comments </h3>
        <div style="margin-top:15px;"><a href="<?php echo BASE_URL?>ajax/get_comments/?pID=<?php echo $pID;?>" class="btn post-loader">View Comments</a></div>
        <!--
        <?php foreach($comments as $c){?>
          <div class="well">
            <p><?php echo  $c['commentText'] . '<br>'.$c['first_name']. ' '.$c['last_name'].  '<br>'. $c['date']  ;?> </p>
            <?php if($u->isAdmin()){
              echo '<a href="'. BASE_URL.'blog/deletecomment/'.$c['commentID'].'"> Delete Comment </a>';
            }?>
          </div>
        <?php }?>-->

        <?php
        if($u->isRegistered()) {
        ?>

        <h4> Add a comment </h4>
          <form action="<?php echo BASE_URL ?>blog/addComment/<?php echo $pID ?>" method="post">
       	 	<label for="Comment">New Comment</label>
       		<input type="text" name="comment" class="input-sm" id="comment" required="comment">
          <input type="hidden" name="pID" value="<?php echo $pID?>"/>
          <input type="hidden" name="uID" value="<?php echo $_SESSION['uID']?>"/>
          <input type="hidden" name="date" value="<?php echo date('Y/m/d')?>"/>
       		<input type="submit" class='btn btn-primary' value="Submit">
       	 </form>
        <?php }
        Else{
          echo '<form action="'. BASE_URL.'/login"> <input type="submit" value="Login to post comments" /></form>';
        } ?>
    </div>


<?php include('views/elements/footer.php');?>
