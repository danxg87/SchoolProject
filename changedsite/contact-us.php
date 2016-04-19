<?php
include('./includes/header.php');
?>
<h1>Contact Us</h1>
<form action="contact-us-send.php" method="post">
	<ul>
		<li>
			<label for="name">Your Name:</label>
			<input type="text" id="name" name="name" />
		</li>
		<li>
			<label for="email">Your Email:</label>
			<input type="text" id="email" name="email" />
		<li>
			<label for="comment">Your Comment:</label>
			<textarea name="comment id="comment"></textarea>
		</li>
		<li>
			<input type="submit" name="submit" value="Click to Send Your Comments" />
		</li>
	</ul>
</form>
<?php
include('./includes/footer.php');
?>