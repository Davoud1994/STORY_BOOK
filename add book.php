<?php

global $connected;
require("config\db_connect.php");



$name=$email = $number = $author = $quantity = $subject = $submit ="";
$errors = array("submit" => '', "email" => '', "number" => '', "subject" => '', "author" => '');
$sql = 'SELECT title,author,id FROM `order book` order by created';

$result = mysqli_query($connected, $sql);

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);



if (isset($_POST['submit'])) {
    $submit = $_POST['submit'];
    $author = $_POST['author'];
    $quantity = $_POST['quantity'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $name=$_POST["name"];
    $subject = mysqli_real_escape_string($connected, $subject);
    $author = mysqli_real_escape_string($connected, $author);
    mysqli_free_result($result);
    mysqli_close($connected);

    if (empty($email) || empty($subject) ||
        empty($author) ||
        empty(($quantity)) || empty($number)|| empty($name) ){
        $errors["submit"] = "!تمام موارد باید تکمیل باشند";

    }



//    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//
//        $errors["email"] = "ایمیل  شما معتبر نیست";
//
//    } else {
//        $email = htmlspecialchars($email);

    }

    if (preg_match("/[0-9]/", $number)) {
        $number = htmlspecialchars($number);
    } else {

        $errors['number'] = "شماره معتبر نیست";
    }

    if (!preg_match("/[a-zA-Z!#$%^&*()+-]+/", $subject)) {
        $subject = htmlspecialchars($subject);
    } else {

        $errors["subject"] = " ! از کاراکترهای فارسی استفاده کنید";
    }
    $author = htmlspecialchars($author);
    $quantity = htmlspecialchars($quantity);

    $num = count($books);

    $i = 0;
    while ($i < $num) {
        if ($books[$i]["title"] === $subject && filter_var($email, FILTER_VALIDATE_EMAIL) &&
             preg_match("/[0-9]/", $number) &&
            !preg_match("/[a-zA-Z!#$%^&*()0-9]+/", $name)) {

            $email = htmlspecialchars($email);
            session_start();
            $_SESSION['name']=$name;
            header("location:index.php");

            break;
        }
        if( !filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $errors["email"] = "ایمیل  شما معتبر نیست";}

      elseif (!preg_match("/[0-9]/", $number)){
          $errors['number'] = "شماره معتبر نیست";
      }

        else{
            header("location:none_access_page.php");}

        $i++;
}


?>

<!DOCTYPE html>

<html lang="FA">

<title>کتاب کوروش(فرم سفارش)</title>

<?php require('header.php'); ?>

<section class="part_1">
    <p dir="rtl" class="title1">لطفا مشخصات کتاب مورد نظر خود را وارد کنید:</p>
    <div class="errors_1"><?php echo $errors["submit"];?></div>
    <form class="add" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <div class="container_add">
            <div dir=rtl class="text_name">
                نام و نام خانوادگی خود را وارد کنید:
            </div>
            <label>
                <input class=Enter_1 type="text" name="name" value="<?php echo $name; ?>">
<!--                <div class="errors_2"> --><?php //echo $errors["email"]; ?><!-- </div>-->
            </label>
            <br>
        <div class="container_add">
            <div dir=rtl class="text_1">
                ایمیل خود را وارد کنید:
            </div>
            <label>
                <input class=Enter_1 type="text" name="email" value="<?php echo $email; ?>">
                <div class="errors_2"> <?php echo $errors["email"]; ?> </div>
            </label>
            <br>

            <!--            <hr class="line_1">-->

            <div dir=rtl class="text_1">
                شماره تلفن خود را وارد کنید :
            </div>
            <label>
                <input class=Enter_1 type="text" name="number" value="<?php echo $number; ?>">
                <div class="errors_2"> <?php echo $errors["number"]; ?> </div>
            </label>
            <br>

            <!--            <hr class="line_1">-->

            <div dir=rtl class="text_1">
                عنوان کتاب:
            </div>
            <label>
                <input class=Enter_1 type="text" name="subject" value="<?php echo $subject ?>">
                <div class="errors_2"><?php echo $errors["subject"]; ?></div>

            </label>
            <br>

            <!--            <hr class="line_1">-->

            <div dir=rtl class="text_1">
                نام نویسنده:
            </div>
            <label>
                <input class=Enter_1 type="text" name="author" value="<?php echo $author; ?>">
            </label>
            <br>

            <!--            <hr class="line_1">-->

            <div dir=rtl class="container_counter">
                <div class="text_1">
                    تعداد کتاب درخواستی:
                    <br>
                </div>
                <label for="quantity">
                    <input class=counter type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>"
                           min="1">
                </label>
            </div>

            <hr class="line_1">

            <label class="button_form1">
                <input class="submit" type="submit" name="submit" value="ثبت">

            </label>
        </div>


    </form>
</section>

<?php require('footer.php'); ?>

</html>

