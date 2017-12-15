<form id="registration_form" action="<?php echo BASE_URL;?>members/edit" method="post">

<fieldset>
<legend>Register Today!</legend>
<label for="first_name">First Name: <?=REQFIELD?></label>
<input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name'];?>" maxlength="20" required="first_name" />
<br />

<label for="last_name">Last Name: <?=REQFIELD?></label>
<input type="text" class="txt" id="last_name" name="last_name" value="<?php echo $user['last_name'];?>" maxlength="20" required="last_name" />
<br />

<label for="email">E-mail Address: <?=REQFIELD?></label>
<input type="text" class="txt" id="email" name="email" value="<?php echo $user['email'];?>" maxlength="100" required="email" />
<br />

<label for="password">Password: <?=REQFIELD?></label>
<input type="password" class="txt" id="password" name="password" value="<?php echo $password;?>" maxlength="100"  />

<label for="confirm">Retype Password: <?=REQFIELD?></label>
<input type="password" class="txt" id="confirm" name="confirm" value="<?php echo $password;?>" maxlength="100"  />

<br />

<input type="hidden" name="uID" value="<?php echo $_SESSION['uID'] ?>"/>

<button id="submit" type="submit" class="btn btn-primary" >Edit Profile</button>
</fieldset>
</form>
