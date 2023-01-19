<?php
$pageTitle = "بررسی ثبت نام";

echo "<head> <style> *{ text-align: center; } </style> </head>";

include("inc/header.php");
?>

<?php

include("inc/functions.php");
include("inc/consts.php");

$fname;
$lname;
$email;
$pass;
$rpass;

function startSave()
{
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['rpass'])) {

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

if (isset($_POST['pass']) and isset($_POST["rpass"]) and ($_POST['pass'] == $_POST['rpass'])) {
    startSave();
} else {
    if (isset($_POST['pass']) and isset($_POST['rpass'])) {
        echo "<p style='text-align: center; color: red;'>رمز مجدد مطابقت ندارد</p>";
    }
}

?>

<table class="user_table">

    <tr>
        <th>شماره</th>
        <th>نام</th>
        <th>نام خانوادگی</th>
        <th>ایمیل</th>
        <th>رمز عبور</th>
        <th>ویرایش</th>
        <th>حذف</th>
    </tr>

    <?php

    //get current page number
    $current_page = getPageNumber();
    // every page how many record will show
    $records_per_page = MAX_NUM_ROW_TABLE;
    // calculate first record of current page
    $from_record = ($current_page - 1) * $records_per_page;

    $q = "SELECT * FROM users";
    $result = mysqli_query(connect_db(), $q);
    // get total record
    $total_records = mysqli_num_rows($result);
    // calculate all pages
    $total_pages = ceil($total_records / $records_per_page);

    $q = "SELECT fname,lname,email,password FROM users LIMIT $records_per_page OFFSET $from_record";
    $result = mysqli_query(connect_db(), $q);

    if (($result != "") and (mysqli_num_rows($result) != 0)) {
        while ($rows = mysqli_fetch_array($result)) {

            // start of row
            echo "<tr>";
            static $c = 1;
            echo "<td>" . $c . "</td>";
            $c++;
            foreach ($rows as $key => $value) {
                if (!is_numeric($key)) {
                    echo "<td>";
                    echo $value;
                    echo "</td>";
                }
            }
            if (!isset($_GET['page'])) {
                echo "<td><a href='#'><img src='icons/edit.png'></img></a></td>";
                echo "<td><a href='signupCheck.php?email=" . $rows['email'] . "'><img src='icons/delete.png'></img></a></td>";
            } else {
                echo "<td><a href='#'><img src='icons/edit.png'></img></a></td>";
                echo "<td><a href='signupCheck.php?" . "page=" . $_GET['page'] . "&" . "email=" . $rows['email'] . "'><img src='icons/delete.png'></img></a></td>";
            }

            // end of row
            echo "</tr>";

            if (isset($_GET['email'])) {
                $em = $_GET['email'];
                $q = "DELETE FROM users WHERE email = '$em'";
                mysqli_query(connect_db(), $q);
                //echo "<meta http-equiv='refresh' content='0'>";
                //header("Location: signupCheck.php?page=$current_page");
                //exit();
                echo("<script>location.href = " . "'signupCheck.php?page=" . "$current_page';</script>");
            }

            mysqli_close(connect_db());
        }
    }
    else if($result == "")
    {
        echo "<h3 style='color: red;'>هیچ کاربری وجود ندارد</h3>";
    }

    if($total_pages < $current_page){
        //header("Location: signupCheck.php?page=$total_pages");
        //exit();
        echo("<script>location.href = " . "'signupCheck.php?page=" . "$total_pages';</script>");
    }
    ?>

</table>

<div class="pagination">
    <p>
        <?php
        $pagelink = "";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                $pagelink .= "<a class='active' href='signupCheck.php?page=$i'>[صفحه $i]</a>";
            } else {
                $pagelink .= "<a href='signupCheck.php?page=$i'>صفحه $i</a>";
            }
        }

        echo $pagelink;
        ?>
    </p>
</div>

<?php
include("inc/footer.php");
?>