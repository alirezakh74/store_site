<?php
$pageTitle = "ورود";
include("inc/header.php");
?>

<?php
require_once("inc/functions.php");
if(isset($_POST['email']) and isset($_POST['pass']))
{
	if(isRegisteredUser($_POST['email']))
	{
		if(checkPassUser($_POST['pass']))
		{
			header("Location: dashboard.php");
		}
		else
		{
			echo "رمز عبور اشتباه است";
		}
	}
	else
	{
		echo "نام کاربری ثبت نشده است";
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