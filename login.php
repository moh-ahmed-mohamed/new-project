<?php
session_start();
include 'config.php'; // Include the configuration file

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query the database to check if the username and password match
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Check if there is a matching user
        if (mysqli_num_rows($result) == 1) {
            // Authentication successful, store username in session
            $_SESSION['user'] = $username;
            header("Location: index.php");
            exit();
        } else {
            // Authentication failed, redirect back to login page with error message
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        // Query execution failed, redirect back to login page with error message
        header("Location: login.php?error=2");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع عقارات مصر | احدث وافضل</title>
    <link rel="icon" href="image/favicon-32x32.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/login.css">

</head>

<body>
    <header>
        <!-- start nav -->
        <nav class="navbar">
            <div class="img">
                <a href="index.php">
                    <img class="imgs" src="./image/عقارات-مصر-2.webp">
                </a>
            </div>
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
                    <li><a href="add.php">
                            إضافة عقارات
                        </a></li>
                    <li><a href="logout.php">
                            تسجيل الخروج
                        </a></li>

                <?php else : ?>
                    <li><a class="active" href="login.php">
                            تسجيل الدخول
                        </a></li>
                <?php endif; ?>
            </ul>

        </nav>
        <!-- end nav -->

    </header>
    <div class="background" dir="rtl">
        <img class="company" src="image/company-bg.jpg" alt="">
        <h1 class="create"> تسجيل الدخول</h1>
    </div>
    <section class="main">
        <div class="your_entry">

            <?php
            // Display error message if authentication failed
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 1) {
                    echo "<p style='color: red;'>Invalid username or password.</p>";
                } elseif ($_GET['error'] == 2) {
                    echo "<p style='color: red;'>Database query failed.</p>";
                }
            }
            ?>

            <form action="" method="POST">
                <h1 class="h1">تسجيل الدخول </h1>
                <div class="form" dir="rtl">
                    <input type="text" id="username" name="username" class="form-control" placeholder="الأسم" required>
                </div>
                <div class="form" dir="rtl">
                    <input type="password" id="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                    <input type="submit" class="btn btn-primary" value="تسجيل الدخول">
                </div>
            </form>
        </div>
    </section>
    <!-- start footer -->
    <footer>
        <!-- satrt footer_left -->
        <div class="footer_left" dir="rtl">
            <h1>تابعونا</h1>
            <div class="folow">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-square-twitter"></i>
                <i class="fa-brands fa-whatsapp"></i>
            </div>
        </div>
        <!-- end footer_left -->
        <!-- start footer_center -->
        <div class="footer_center" dir="rtl">
            <h1>عن عقارات مصر</h1>
            <a href="#">الرئيسية</a>
            <a href="#">من نحن</a>
            <a href="#">اتصل بنا</a>
            <a href="#">سياسة الخصوصية</a>
            <a href="#">خريطة الموقع</a>
        </div>
        <!-- end footer_center -->
        <!-- start footer_right -->
        <div class="footer_right" dir="rtl">
            <img src="image/عقارات-مصر-2.webp" alt="">
            <p>نقدم لك أهم الإحصائيات والنسب الاستثمارية بشكل مبسط لمساعدتك على تحديد الحي ونوع العقار الذي يحقق أعلى عائد استثماري.</p>
        </div>
        <!-- end footer_right -->
    </footer>
    <!-- end footer -->


</body>

</html>