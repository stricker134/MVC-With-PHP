
<?php
include('views/elements/header.php');?>

<div class="container">
<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>

  <?php foreach($users as $u){?>
    <h3><a href="<?php echo BASE_URL?>members/users/<?php echo $u['uID'];?>" title="<?php echo $u['first_name'];?> <?php echo $u['last_name'];?>"><?php echo $u['email'];?></a></h3>
    <p><?php echo $u['first_name'];?> <?php echo $u['last_name'];?></p>
    <p><a href="mailto:<?php echo $u['email'];?>"><?php echo $u['email'];?></a></p>
    <?php if($u['active'] == 0) {
      echo '<button type="button" class="btn btn-success"><a href="'.BASE_URL.'/managemembers/activate/'.$u['uID'].'/">Activate User</a></button>';
    };?>
    <?php if($u['user_type'] == 2) {
      echo '<button type="button" class="btn btn-danger"><a href="'.BASE_URL.'/managemembers/delete/'.$u['uID'].'/">Delete User</a></button>';
    };?>

    <?php }?>

</div>

<?php include('views/elements/footer.php');?>
