<?php
$pageTitle = "بررسی ثبت نام";

echo "<head> <style> *{ text-align: center; } </style> </head>";

include("inc/header.php");
?>

<?php

require_once("inc/functions.php");

$fname;
$lname;
$email;
$pass;
$rpass;

function startSave()
{
    if ( isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['rpass']) ) {

        global $fname, $lname, $email, $pass, $rpass;
        $fname = input_check($_POST["fname"]);
        $lname = input_check($_POST["lname"]);
        $email = input_check(strtolower($_POST["email"]));
        $pass = $_POST["pass"];
        $rpass = $_POST["rpass"];

        echo "نام: " . $fname . "<br>";
        echo "نام خانوادگی: " . $lname . "<br>";
        echo "ایمیل: " . $email . "<br>";
        echo "پسورد: " . $pass . "<br>";

        save_user();
    } else {
        echo "<p style='text-align: center; color: red;'>ثبت نام مشکل دارد و انجام نشد</p>";
    }
}

if(isset($_POST['pass']) and isset($_POST["rpass"]) and ($_POST['pass'] == $_POST['rpass']))
{
    startSave();
}
else
{
    echo "<p style='text-align: center; color: red;'>رمز مجدد مطابقت ندارد</p>";
}

?>

<table class="user_table">

    <tr>
        <th>شماره</th>
        <th>نام</th>
        <th>نام خانوادگی</th>
        <th>ایمیل</th>
        <th>پسورد</th>
    </tr>
    <?php
    $file = fopen('users.txt', 'r');
    while (!feof($file)) {
        $str = trim(fgets($file), "\n");
        $myarray = explode(',', $str);

        if($myarray[0] == "") // or ($myarray[0] == null)
        {
            break;
        }
        echo "<tr>";
        static $c = 1;
        echo "<td>" . $c . "</td>";
        $c++;
        foreach ($myarray as $value) {
            echo "<td>";
            echo $value;
            echo "</td>";
        }
        echo "</tr>";
    }

    fclose($file);
    ?>

</table>

<?php
include("inc/footer.php");
?>