<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
		<h1>Categories</h1>
  	</div>

  		<?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }
		foreach($categories as $c){
			echo "<h3>".$c['name']."</h3>";?>
			<button style="margin-top:15px;"><a href="<?php echo BASE_URL?>managecategories/edit/<?php echo $c['categoryID'];?>" >Edit Category</a></button>
		<?php }?>

		<form action="<?php echo BASE_URL ?>categories/add" method="post">
 	 	<label for="category">New Category</label>
 		<input type="text" name="category" class="input-sm" id="category" required="category">
 		<input type="submit" class='btn btn-primary' value="Submit">
 	 </form>

</div>

<?php include('views/elements/footer.php');?>
