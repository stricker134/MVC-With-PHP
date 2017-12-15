<?php
include('views/elements/header.php');?>
<div class="container">

		<div style="width:75%;float:left;">
	<div class="page-header">
		<h1> Welcome to the final blog of CIT 31300 </h1>

		<img src="http://corsair.cs.iupui.edu:22001/final/application/images/blog.png">

    <h1>Latest News from <?php echo $title;?></h1>
  </div>
    <?php
    echo $data;
    ?>
	</div>
	<div style="width:20%; float:right;">
	<h3> Find info about your IP: </h3>
	<form method="post" action="<?php echo BASE_URL?>ajax/getip">

			<label for "ip">Enter Your IP Address</label>
			<input type="text" name="ip" id="ip" required="ip" />
			<br/>
			<div style="margin-top:15px;"><a href="<?php echo BASE_URL?>ajax/getip/" class="btn xml-loader">View Info</a></div>
	</form>
</div>
</div>


	 <script>
       $(document).ready(function() {

           $('.xml-loader').click(function(event) {
               event.preventDefault();
               var el = $(this);

               $.ajax({
								 type: 'POST',
								url: el.attr('href'),
								data: $('form').serialize(),
                  success:function(data) {
                    el.parent().append(data);
                    el.remove();


                  }


                });

           });
       });
    </script>

<?php include('views/elements/footer.php');?>
