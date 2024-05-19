<?php
session_start();
include 'config.php';
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع عقارات مصر </title>
    <link rel="icon" href="image/favicon-32x32.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/adds.css">
</head>

<body>
    <header>
        <!-- start nav -->
        <nav class="navbar">
            <a href="index.php">
                <img class="imgs" src="./image/عقارات-مصر-2.webp">
            </a>
            <ul dir="rtl">
                <li><a href="index.php">
                        الصفحة الرئيسية</a </a></li>
                <li><a href="sale.php">
                        عقارات للبيع
                    </a></li>
                <li><a href="rent.php">
                        عقارات للإيجار
                    </a></li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li><a class="active" href="add.php">
                            إضافة عقارات
                        </a></li>
                    <li><a href="logout.php">
                            تسجيل الخروج
                        </a></li>

                <?php else : ?>
                    <li><a href="login.php">
                            تسجيل الدخول
                        </a></li>
                <?php endif; ?>
            </ul>

        </nav>
        <!-- end nav -->

    </header>

    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">

                <img class="img" src="image/عقارات-مصر-2.webp" alt="logo">

                <h2>إضافة عقار للإيجار</h2>

                <input type="text" name='price' dir="rtl" placeholder="السعر">
                <br>
                <input type="text" name='details' dir="rtl" placeholder="التفاصيل">
                <br>
                <input type="text" name='place' dir="rtl" placeholder="المكان">
                <br>
                <input type="text" name='kind_drug' dir="rtl" placeholder="نوع العقار">
                <br>
                <input type="text" name='rooms' dir="rtl" placeholder="الغرف">
                <br>
                <input type="text" name='space' dir="rtl" placeholder="المساحة">
                <br>
                <input type="text" name='roles' dir="rtl" placeholder="الدور">
                <br>
                <input type="text" name='finishing' dir="rtl" placeholder="التشطيب">
                <br>
                <input type="text" name='the_offer' dir="rtl" placeholder="العرض">
                <br>
                <input type="text" name='bathrooms' dir="rtl" placeholder="الحمامات">
                <br>
                <input type="text" name='descriptions' dir="rtl" placeholder="الوصف">
                <br>

                <input type="file" id="file" name='image' style="display: none;">

                <label for="file">اختيار صورة للعقار</label>

                <button class="button" name='uploads'>رفع العقار</button>
                <br><br>
                <a class="show" href="index.php">عرض جميع النتجات</a>
                <br>
                <br>
                <a class="rent" href="add.php">إضافة عقار للبيع</a>


            </form>
        </div>

    </center>

</body>

</html>