<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
   <h1>You Edited Your Profile</h1>
  </div>

  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
</div>
<?php include('views/elements/footer.php');?>
