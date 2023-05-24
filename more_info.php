<?php
global $connected;

include("config\db_connect.php");

$books="";

if (isset($_GET['id'])){

    $id=mysqli_real_escape_string($connected,$_GET['id']);

    $sql="SELECT * FROM `order book` WHERE id=$id";

    $result =mysqli_query($connected,$sql);

    $books=mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($connected);


    
}


?>

<!DOCTYPE html>

<html lang="fa">
<?php require('header.php'); ?>

<head>
    <link rel="stylesheet" href="css/style_project_more_info.css">
    <title>اطلاعات بیشتر</title>
</head>
<body>
<div  dir = "rtl" class="details1">
    <?php if($books):?>
    <div class="title4">
        <ul>
    <li class="title3"> <?php echo htmlspecialchars($books['title']);?></li>
            <?php if($books['id']==1):?>
        <li>به قلم محمد امین ضرابی</li>
        <li>ناشر:نشر میلیکان</li>
         <li>قیمت:25000 تومان</li>
         <li> تعداد در انبار:<?php echo $books['Order number'];?></li>
         <li><a class="link_con" href="submit_order_end.php"> برای نهایی کردن سفارش کلیک کنید</a></li>
        </ul>
        <?php endif;?>
        <?php if($books['id']==2):?>
            <li>به قلم خلیل جبران</li>
            <li>ناشر:انتشارات ذهن اویز</li>
            <li>قیمت:20000 تومان</li>
            <li> تعداد در انبار:<?php echo $books['Order number'];?></li>
            <li><a class="link_con" href="submit_order_end.php"> برای نهایی کردن سفارش کلیک کنید</a></li>
            </ul>
        <?php endif;?>
        <?php if($books['id']==3):?>
            <li>به قلم لیون امیل</li>
            <li>ناشر:نشر اطراف</li>
            <li>قیمت:41300 تومان</li>
            <li> تعداد در انبار:<?php echo $books['Order number'];?></li>
            <li><a class="link_con" href="submit_order_end.php"> برای نهایی کردن سفارش کلیک کنید</a></li>
            </ul>
        <?php endif;?>
    </div>

    <div>
        <?php if($books['id']==1):?>
        <div>
            <img  src=image/4518796458288944.jpg>
        </div>  <?php endif;?>
            <?php if($books['id']==2):?>
                <div>
                    <img  src=image/2543685403632287.jpg>
                </div> <?php endif;?>
                <?php if($books['id']==3):?>
                    <div>
                        <img  src=image/6838629892377922.jpg>
                    </div> <?php endif;?>
</div>


        <?php endif;?>





</div>





</body>
<?php require('footer.php'); ?>
</html>

