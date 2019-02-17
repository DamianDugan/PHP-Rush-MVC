<?php

function convertDate ($mysqldate)
{
	$phpdate = strtotime($mysqldate);
	$mysqldate = date( 'd/m H:i', $phpdate );
	return $mysqldate;
}

echo '<div class="Views-articles-displayAll">';
echo '<table>';
foreach ($this->vars as $key => $value) {
	echo '<tr>';
	echo '<td>' . $value['title'] . ' </td>';
	echo '<td> ' . $value['description'] . ' </td>';
	echo '<td> ' . convertDate($value['creation_date']) . ' </td>';
	echo '<td> ' . convertDate($value['edition_date']) . '</td>';
	echo '<td><a href="';
	echo WEBROOT ."Articles/delete/".$value['id'];
	// echo ("mon lien");
	echo '">Delete</a></td>';
	echo '</tr>';
}
echo '</table>';
echo '</div>';

?>