<?php
if(isset($_POST['submit'])) {
	$msg = 'Name: ' .$_POST['name'] ."\n"
		.'Email: ' . $_POST['email'] ."\n"
		.'Comment: ' .$_POST['comment'];
	mail('naturalproject123@gmail.com', 'Sample Contact Us Form', $msg);
	header ('location: contact-us-thank-you.php');
} else {
	header('location: contact-us.php');
	exit (0);
}
?>
