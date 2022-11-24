<?php
$pageTitle = "بررسی ثبت نام";

echo "<head> <style> *{ text-align: center; } </style> </head>";

include("inc/header.php");
?>

<?php
$fname;
$lname;
$email;
$pass;

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pass'])) {

    global $fname, $lname, $email, $pass;
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    echo "نام: " . $fname . "<br>";
    echo "نام خانوادگی: " . $lname . "<br>";
    echo "ایمیل: " . $email . "<br>";
    echo "پسورد: " . $pass . "<br>";

    save_user();
} else {
    echo "ثبت نام مشکل دارد و انجام نشد";
}

//show_users();

function save_user()
{

    global $fname, $lname, $email, $pass;

    $file = fopen('users.txt', 'a+');

    fwrite($file, $fname . ",");
    fwrite($file, $lname . ",");
    fwrite($file, $email . ",");
    fwrite($file, $pass . "\n");

    fclose($file);
    echo "<span style='color: red; background-color: silver'>" . "کاربر ذخیره شد" . "</span><br>";
}

function show_users()
{
    $file = fopen('users.txt', 'r') or exit("Unable to open file!");
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
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