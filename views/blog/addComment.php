
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
        <sub><?php echo 'Posted on ' . $date . ' by <a href="'.BASE_URL.'members/view/'. $uid.'">'. $first_name . ' ' . $last_name . '</a> in <a href="'.BASE_URL.'category/view/'. $categoryid.'">' . $name .'</a>'; ?>
        </sub>
        <h3> Comments </h3>
        <?php foreach($comments as $c){?>
          <div class="well">
            <p><?php echo  $c['commentText'] . '<br>'.$c['first_name']. ' '.$c['last_name'].  '<br>'. $c['date']  ;?> </p>
          </div>
        <?php }?>

        <?php
        if($u->isRegistered()) {
        ?>
        <h4> Add a comment </h4>
          <form action="<?php echo BASE_URL ?>blog/addComment/<?php echo $pID ?>" method="post">
       	 	<label for="Comment">New Comment</label>
       		<input type="text" name="comment" class="input-sm" id="comment" required="comment">
          <input type="hidden" name="pID" value="<?php echo $pID?>"/>
          <input type="hidden" name="uID" value="<?php echo $uID?>"/>
       		<input type="submit" class='btn btn-primary' value="Submit">
       	 </form>
        <?php }
        Else{
          echo '<form action="'. BASE_URL.'/login"> <input type="submit" value="Login to post comments" /></form>';
        } ?>
    </div>


<?php include('views/elements/footer.php');?>
