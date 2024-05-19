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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="./assets/details.css">


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
          <li><a href="add.php">
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
  <?php
  include('config.php');

  // Check if 'id' parameter is set in the URL
  if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']); // Sanitize input

    // Fetch details of the selected card based on its ID
    $query = "SELECT * FROM rent WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result) {
      // Check if card exists
      if (mysqli_num_rows($result) == 1) {
        $rows = mysqli_fetch_assoc($result);

        // Display details of the selected card
        echo "
                <div class='miin'>
                <section class='main'>
                <div>      
                  
                <img src='image/$rows[image]' class='img' >
                <p>$rows[details]</p>
                <h1 dir='rtl'>$rows[price]</h1>
                <h1><i class='icon fa-solid fa-location-dot'></i>$rows[place]</h1>
          
              </div>
            </section>
            </div>
            <div class='title'>
              <h1>تفاصيل العقار</h1>
            </div>
            <div class='miin'>
            <section class='information'>
              <div class='details'>
                <div class='box'>
                  <h1>نوع العقار</h1>
                  <h3>$rows[kind_drug]</h3>
                </div>
                <div class='box'>
                  <h1> الغرف</h1>
                  <h3>$rows[rooms]</h3>
                </div>
              
              <div class='box'>
                <h1> المساحة </h1>
                <h3>$rows[space]</h3>
              </div>
          
                <div class='box'>
                  <h1>الدور</h1>
                  <h3>$rows[roles]</h3>
                </div>
          
              </div>
              <div class='details1'>
              <div class='boxs' id='box'>
                <h1> نوع التشطيب</h1>
                <h3>$rows[finishing]</h3>
              </div>
            
            <div class='boxs' id='box'> 
              <h1> العرض</h1>
              <h3>$rows[the_offer]</h3>
            </div>
          
              <div class='boxs'>
                <h1>الحمامات</h1>
                <h3>$rows[bathrooms] </h3>
              </div>
            </div>
            </section> 
            </div> 
            
            <div class='title'>
              <h1>الوصف </h1>
            </div>
            <div class='miin'>
            <section class='seystem'>
              <div> 
                <p> $rows[descriptions]  </p>
              </div>
            </section>
            </div>
            ";
      } else {
        echo "Invalid card ID.";
      }
    } else {
      // Display MySQL error if query fails
      echo "Error: " . mysqli_error($con);
    }
  } else {
    echo "Card ID is not provided.";
  }
  ?>


  <footer>
    <div class="footer_left" dir="rtl">
      <h1 class="hf">تابعونا</h1>
      <div class="folow">
        <i class="fa-brands ico fa-facebook"></i>
        <i class="fa-brands ico fa-instagram"></i>
        <i class="fa-brands ico fa-square-twitter"></i>
        <i class="fa-brands ico fa-whatsapp"></i>
      </div>

    </div>
    <div class="footer_center" dir="rtl">
      <h1 class="hc">عن عقارات مصر</h1>
      <a class="a" href="#">الرئيسية</a>
      <a class="a" href="#">من نحن</a>
      <a class="a" href="#">اتصل بنا</a>
      <a class="a" href="#">سياسة الخصوصية</a>
      <a class="a" href="#">خريطة الموقع</a>

    </div>
    <div class="footer_right" dir="rtl">
      <img src="image/عقارات-مصر-2.webp" alt="">
      <p>نقدم لك أهم الإحصائيات والنسب الاستثمارية بشكل مبسط لمساعدتك على تحديد الحي ونوع العقار الذي يحقق أعلى عائد استثماري.</p>


    </div>


  </footer>
</body>

</html>