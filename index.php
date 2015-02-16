<?php
require_once 'includes/config.php';
require_once 'classes/db.php';

$db=new Database();


if (isset($_POST['formtype'])) {
	if ($_POST['formtype']=='insert') {
		$fname=$_POST['firstname'];
		$lname=$_POST['lastname'];
		$email=$_POST['email'];

		$sql='INSERT INTO users (firstname, lastname, email) VALUES (\''.$fname.'\', \''.$lname.'\', \''.$email.'\')';
		$db->insert($sql);
	} else if ($_POST['formtype']=='delete') {
		$id=$_POST['id'];
		$sql='DELETE FROM users WHERE id='.$id;
		$db->delete($sql);
	}
}


$sql='SELECT * FROM users';
$users=$db->selectmany($sql);

echo '<table border=1>';
echo '<tr><td>ID</td><td>First name</td><td>Last name</td><td>Email</td><td>&nbsp</td></tr>';

foreach ($users as $user) {
	echo '<tr>';
	echo '<td>'.$user['id'].'</td>';
	echo '<td>'.$user['firstname'].'</td>';
	echo '<td>'.$user['lastname'].'</td>';
	echo '<td>'.$user['email'].'</td>';
	echo '<td>';
	echo '<form action=\'index.php\' method=\'POST\'>';
	echo '<input type=\'hidden\' id=\'id\' name=\'id\' value=\''.$user['id'].'\'>';
	echo '<input type=\'hidden\' id=\'formtype\' name=\'formtype\' value=\'delete\'>';
	echo '<input type=\'submit\' value=\'Delete\' id=\'submitbutton\' name=\'submitbutton\'>';
	echo '</form>';
	echo '</td>';
	echo '</tr>';
}
echo '</table>';


?>
<BR><BR><BR>
<form action='index.php' method='POST'>
First name: <input type='text' id='firstname' name='firstname'><BR>
Last name: <input type='text' id='lastname' name='lastname'><BR>
Email: <input type='text' id='email' name='email'><BR>
<input type='hidden' id='formtype' name='formtype' value='insert'>
<input type='submit' value='Submit' id='submitbutton' name='submitbutton'>
</form>


<BR><BR>
<a href="duplicate.php">View Duplicates</a>
