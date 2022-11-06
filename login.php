<?php
$pageTitle = "ورود";
include("inc/header.php");
?>

<div class="login_form">
	<form action="login_process.php" method="post">
		<h2>فرم ورود</h2>
		<!-- <label>نام کاربری</label> -->
		<input type="text" placeholder="ورود نام کاربری">
		<br>
		<!-- <label>نام خانوادگی</label> -->
		<input type="password" placeholder="ورود پسورد">
		<br>
		<input type="submit" value="ورود">
	</form>
</div>

<?php
include("inc/footer.php");
?>