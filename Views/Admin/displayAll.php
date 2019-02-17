<?php

function convertDate ($mysqldate)
{
	$phpdate = strtotime($mysqldate);
	$mysqldate = date( 'd/m H:i', $phpdate );
	return $mysqldate;
}

?>

<div class="Admin-displayAll">
	<table>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Group</th>
			<th>Status</th>
			<th>Creation date</th>
			<th>Edition date</th>
			<th>Actions</th>
		</tr>
		<?php 
		foreach ($this->vars as $key => $value) 
		{
		?>
		<tr>
			<td><?php echo $value['username'] ?></td>
			<td><?php echo $value['email'] ?></td>
			<td><?php echo $value['groupe'] ?></td>
			<td><?php echo $value['status'] ?></td>
			<td><?php echo convertDate($value['creation_date']) ?></td>
			<td><?php echo convertDate($value['edition_date']) ?></td>
			<td><a href="<?php echo WEBROOT ?>Admin/delete/<?php echo $value['id'] ?>">Delete</a>
	 		  / <a href="<?php echo WEBROOT ?>Admin/editUser/<?php echo $value['id'] ?>">Edit</a></td>
		</tr>
		<?php
		}
		?>
	</table>
	<a href="<?php echo WEBROOT ?>Admin/addUser/">Add user</a>
</div>