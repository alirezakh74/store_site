<?php
function input_check($data)
{
    $data = htmlspecialchars($data);
    $data = addslashes($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

function save_user()
{
    global $fname, $lname, $email, $pass, $rpass;

    if(isRegisteredUser($email))
    {
        return;
    }

    $file = fopen('users.txt', 'a+');

    fwrite($file, $fname . ",");
    fwrite($file, $lname . ",");
    fwrite($file, $email . ",");
    fwrite($file, $pass . "\n");

    fclose($file);
    echo "<span style='color: red; background-color: silver; padding-bottom: 5px'>" . "کاربر ذخیره شد" . "</span><br>";
}

function show_users()
{
    $file = fopen('users.txt', 'r') or exit("Unable to open file!");
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
}

function isRegisteredUser($user_email)
{
    $file = fopen('users.txt', 'a+');
    while (!feof($file)) {
        $str = trim(fgets($file), "\n");
        $myarray = explode(',', $str);
        if(isset($myarray[2]))
        {
            if($myarray[2] == $user_email)
            {
                fclose($file);
                return true;
            }
        }
    }
    fclose($file);

    return false;
}

function checkPassUser($pass)
{
    $file = fopen('users.txt', 'a+');
    while (!feof($file)) {
        $str = trim(fgets($file), "\n");
        $myarray = explode(',', $str);
        if(isset($myarray[3]))
        {
            if($myarray[3] == $pass)
            {
                fclose($file);
                return true;
            }
        }
    }
    fclose($file);

    return false;
}

?>