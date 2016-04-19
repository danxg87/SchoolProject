<?php
include('./includes/header.php');
?>
<h1>Contact Us</h1>
<table>
<form action="contact-us-send.php" method="post">

		<tr text-align="center">
			<label for="name">Your Name:</label>
			<input type="text" id="name" name="name" />
		</tr>
		<tr>
			<label for="email">Your Email:</label>
			<input type="text" id="email" name="email" />
		</tr>
			<label for="comment">Your Comment:</label>
			<textarea name="comment id="comment"></textarea>
		</tr>
</b>
		<tr>
			<input type="submit" name="submit" value="Click to Send Your Comments" />
		</tr>
	
</form>
</table>
<?php
include('./includes/footer.php');
?>
