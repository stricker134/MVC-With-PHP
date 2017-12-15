<?php
$comments = $response;?>
<?php foreach($comments as $c){?>
  <div class="well">
    <p><?php echo  $c['commentText'] . '<br>'.$c['first_name']. ' '.$c['last_name'].  '<br>'. $c['date']  ;?> </p>
    <?php if($u->isAdmin()){
      echo '<a href="'. BASE_URL.'blog/deletecomment/'.$c['commentID'].'"> Delete Comment </a>';
    }?>
  </div>
<?php }?>
