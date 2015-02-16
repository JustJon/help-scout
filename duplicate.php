<?php
require_once 'includes/config.php';
require_once 'classes/db.php';

$db=new Database();


$sql='SELECT DISTINCT email  FROM users';
$emails=$db->selectmany($sql);

foreach ($emails as $email) {

	$sql='SELECT * FROM users where email = \''.$email['email'].'\'';
	$users=$db->selectmany($sql);

	if (count($users) > 1) {


		echo '<table border=1>';
		echo '<tr><td>ID</td><td>First name</td><td>Last name</td><td>Email</td></tr>';

		foreach ($users as $user) {
			echo '<tr>';
			echo '<td>'.$user['id'].'</td>';
			echo '<td>'.$user['firstname'].'</td>';
			echo '<td>'.$user['lastname'].'</td>';
			echo '<td>'.$user['email'].'</td>';
			echo '</tr>';
		}
		echo '</table>';
		echo "<BR><BR>";
	}
}

?>
<BR><BR>
<a href="/">View All Records</a>
