<?php

if(!empty($_SESSION['userid'])) {
	$userName =  $_SESSION['username'];	?>
	<div id="loggedPanel">
	Logged in <span id="loggedUser" class="logged-user"><?php echo $userName; ?></span>
	<a href="action.php?action=logout">Logout</a>
	</div>	
	<?php
} else {
	
}
?>	
