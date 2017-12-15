<?php
include('views/elements/header.php');
?>

<div class="container">
	<div class="page-header">
   <h1>Register</h1>

   <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>

<?php include('views/elements/registration_form1.php');
echo '<p><a href="'.BASE_URL.'">Back to home page</a></p>';
?>

</div>
</div>



<script>
	$(document).ready(function () {
	$( "#registration_form" ).validate({
		rules: {
			first_Name: {
				required: true
			},
			last_Name:{
				required:true
			},
			email:{
				required:true,
				email:true
			},
		}
		});
	});
	</script>

<?php include('views/elements/footer.php');
?>
