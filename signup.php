<?php
$pageTitle = "ثبت نام";
include("inc/header.php");
?>

<div class="singup_form">
    <form action="signupcheck.php" method="post">
        <h2>فرم ثبت نام</h2>
        <input type="text" placeholder="نام" name="name">
        <input type="text" placeholder="نام خانوادگی" name="fname">
        <input type="email" placeholder="ایمیل" name="email">
        <input type="password" placeholder="ورود رمز عبور" name="pass">
        <input type="password" placeholder="ورود مجدد رمز عبور">
        عکس:<input type="file" name="picture">
        <input type="submit" value="ثبت نام">
    </form>
</div>

<?php
include("inc/footer.php");
?>