<?php
$pageTitle = "بررسی ثبت نام";
include("inc/header.php");
?>

<?php
if (isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['pass'])) {
    $name = $_POST["name"];
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    echo "نام: " . $name . "<br>";
    echo "نام خانوادگی: " . $fname . "<br>";
    echo "ایمیل: " . $email . "<br>";
    echo "پسورد: " . $pass . "<br>";
}
?>

<?php
include("inc/footer.php");
?>