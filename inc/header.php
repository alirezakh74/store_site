<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title><?php echo $pageTitle; ?></title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <div class="rightNav">
                    <li>
                        <a href="index.php">صفحه اصلی</a>
                    </li>
                    <li>
                        <a href="photo_gallery.php">گالری تصاویر</a>
                    </li>
                    <li>
                        <a href="contact_us.php">تماس با ما</a>
                    </li>
                </div>
                <div class="leftNav">
                    <li>
                        <a href="login.php">ورود</a>
                    </li>
                    <li>
                        <a href="signup.php">ثبت نام</a>
                    </li>
                    <!--<li>
                        <span id="jsdate"></span>
                    </li> -->
                    <li>
                        <span class='jdate'>
                            امروز: 
                            <?php
                            require("inc/jdf.php");
                            echo jdate("Y/m/d", "", "","Asia/Tehran", "fa");
                            ?>
                        </span>
                    </li>
                </div>
            </ul>
        </nav>
    </header>