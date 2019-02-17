<?php

var_dump($this->vars[0]['email']);

$id = $this->vars[0]['id'];
$username = $this->vars[0]['username'];
$email = $this->vars[0]['email'];
$groupe = $this->vars[0]['groupe'];
$status = $this->vars[0]['status'];

?>

<form method="post" action="<?php echo WEBROOT . 'Admin/updateUser/' . $id ?>">
	<label>Username</label>
	<input type="text" name="username" id="username" value="<?php echo $username ?>"> <br>

	<label>Email</label>
	<input type="text" name="email" id="email" value="<?php echo $email ?>"> <br>

	<label>Password</label>
	<input type="password" name="password" id="password"><br>


	<label>Password confirmation</label>
	<input type="password" name="password_confirmation" id="password_confirmation"><br>

	<label>Groupe</label>
	<select name="groupe">
	    <option value="">--Please choose an option--</option>
	    <option value="0" <?php if ($groupe==0) { echo 'selected'; } ?>>User</option>
	    <option value="1" <?php if ($groupe==1) { echo 'selected'; } ?>>Writer</option>
	    <option value="2" <?php if ($groupe==2) { echo 'selected'; } ?>>Administrator</option>
	</select>

	<lablel>Status</label>
	<select name="status">
	    <option value="">--Please choose an option--</option>
	    <option value="0" <?php if ($status==0) { echo 'selected'; } ?>>Active</option>
	    <option value="1" <?php if ($status==1) { echo 'selected'; } ?>>Desactive</option>
	</select>

	<input type="submit" name="submit" value="submit">
 </form>