<?php
$pageTitle = "ورود";
include("inc/header.php");
?>

<?php
require_once("inc/functions.php");
if(isset($_POST['email']) and isset($_POST['pass']))
{

	$email = $_POST['email'];
	$email = strtolower(trim($email));
	$pass = $_POST['pass'];

	if(isRegisteredUser($email))
	{
		if(checkPassUser($pass))
		{
			header("Location: dashboard.php");
		}
		else
		{
			echo "<p style='text-align: center; color: red;'>رمز عبور اشتباه است</p>";
		}
	}
	else
	{
		echo "<p style='text-align: center; color: red;'>نام کاربری ثبت نشده است</p>";
	}
}
?>

<div class="login_form">
	<form action="" method="post">
		<h2>فرم ورود</h2>
		<!-- <label>نام کاربری</label> -->
		<input class="ltr" type="email" name="email" placeholder="ورود ایمیل(نام کاربری)" required>
		<br>
		<!-- <label>نام خانوادگی</label> -->
		<input class="ltr" type="password" name="pass" placeholder="ورود پسورد" required>
		<br>
		<input type="submit" value="ورود">
	</form>
</div>

<?php
include("inc/footer.php");
?>