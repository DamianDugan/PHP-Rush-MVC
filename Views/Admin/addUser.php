<form method="post" action="<?php echo WEBROOT . 'Admin/createUser/' ?>">
	<label>Username</label>
	<input type="text" name="username" id="username"> <br>

	<label>Email</label>
	<input type="text" name="email" id="email"> <br>

	<label>Password</label>
	<input type="password" name="password" id="password"><br>


	<label>Password confirmation</label>
	<input type="password" name="password_confirmation" id="password_confirmation"><br>

	<label>Groupe</label>
	<select name="groupe">
	    <option value="">--Please choose an option--</option>
	    <option value="0">User</option>
	    <option value="1">Writer</option>
	    <option value="2">Administrator</option>
	</select>

	<lablel>Status</label>
	<select name="status">
	    <option value="">--Please choose an option--</option>
	    <option value="0">Active</option>
	    <option value="1">Desactive</option>
	</select>

	<input type="submit" name="submit" value="submit">
 </form>