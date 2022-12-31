<?php
$pageTitle = "تماس با ما";
include("inc/header.php");
?>

<?php

?>

<div class="contact_form">
    <form action="" method="POST">
        <h2>فرم تماس</h2>
        <input type="text" placeholder="نام" name="name">
        <input type="text" placeholder="نام خانوادگی" name="fname">
        <input type="email" placeholder="ایمیل" name="email">
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br> 
        <input type="submit" value="ارسال">
    </form>
</div>

<?php
include("inc/footer.php");
?>