<?php

include('config.php');


if (isset($_POST['upload'])) {

    $PRICE = $_POST['price'];
    $DETAILS = $_POST['details'];
    $PLACE = $_POST['place'];
    $filename = $_FILES['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    $folder = "image/";
    $kind_drug = $_POST['kind_drug'];
    $rooms = $_POST['rooms'];
    $space = $_POST['space'];
    $roles = $_POST['roles'];
    $finishing = $_POST['finishing'];
    $the_offer    = $_POST['the_offer'];
    $bathrooms = $_POST['bathrooms'];
    $descriptions = $_POST['descriptions'];

    move_uploaded_file($filetmpname, $folder . $filename);


    $insert = "INSERT INTO card ( price, details , place , image , kind_drug , rooms , space , roles , finishing , the_offer  ,bathrooms , descriptions) 
VALUES ( '$PRICE','$DETAILS','$PLACE','$filename','$kind_drug','$rooms','$space','$roles','$finishing','$the_offer','$bathrooms','$descriptions')";
    mysqli_query($con, $insert);
    if (move_uploaded_file($image_location, 'image/' . $image_name)) {
        echo "<script>alert('تم رفع العقار بنجاح')</script>";
    } else {
        echo "<script>alert('حدث مشكلة لم يتم رفع العقار')</script>";
    }
    header('location: add.php');
}
?>

<?php

include('config.php');


if (isset($_POST['uploads'])) {

    $PRICE = $_POST['price'];
    $DETAILS = $_POST['details'];
    $PLACE = $_POST['place'];
    $filename = $_FILES['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    $folder = "image/";
    $kind_drug = $_POST['kind_drug'];
    $rooms = $_POST['rooms'];
    $space = $_POST['space'];
    $roles = $_POST['roles'];
    $finishing = $_POST['finishing'];
    $the_offer    = $_POST['the_offer'];
    $bathrooms = $_POST['bathrooms'];
    $descriptions = $_POST['descriptions'];

    move_uploaded_file($filetmpname, $folder . $filename);


    $insert = "INSERT INTO rent ( price, details , place , image , kind_drug , rooms , space , roles , finishing , the_offer  ,bathrooms , descriptions  ) 
VALUES ( '$PRICE','$DETAILS','$PLACE','$filename','$kind_drug','$rooms','$space','$roles','$finishing','$the_offer','$bathrooms','$descriptions')";
    mysqli_query($con, $insert);
    if (move_uploaded_file($image_location, 'image/' . $image_name)) {
        echo "<script>alert('تم رفع العقار بنجاح')</script>";
    } else {
        echo "<script>alert('حدث مشكلة لم يتم رفع العقار')</script>";
    }
    header('location: addrent.php');
}
?>

