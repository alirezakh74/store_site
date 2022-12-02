<?php
$pageTitle = "ثبت نام";
include("inc/header.php");
?>

<div class="singup_form">
    <form action="signupCheck.php" method="post" enctype="multipart/form-data">
        <h2>فرم ثبت نام</h2>
        <input type="text" placeholder="نام" name="fname" required>
        <input type="text" placeholder="نام خانوادگی" name="lname" required>
        <input class="ltr" type="email" placeholder="ایمیل(نام کاربری)" name="email" required>
        <input class="ltr" type="password" placeholder="ورود رمز عبور" name="pass" required>
        <input class="ltr" type="password" placeholder="ورود مجدد رمز عبور" name="rpass" required>
        <br>
        <!-- <label for="pic_file">تصویر شما</label>
        <input type="file" accept="image/*" id="pic_file" name="pic_file"> -->
        <label class="file_label" for="pic_file" class="btn-2">بارگذاری تصویر</label>
        <input type="file" id="pic_file" name="pic_file">
        <input type="submit" value="ثبت نام">
    </form>
</div>

<?php
include("inc/footer.php");
?>