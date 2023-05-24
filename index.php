<?php

global $connected;

include("config\db_connect.php");

$sql='SELECT title,author,id FROM `order book` order by created';

$result=mysqli_query($connected,$sql);

$books=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($connected);






?>


<!DOCTYPE html>

<html  lang="fa">

<?php require('header.php'); ?>

<div class="page_body_index">

<div  class="title2">
 :فهرست کتابهای موجود
</div>
   <div class="clients">
      <?php foreach ($books as $book):?>
      <div class="boxes">
            <div>عنوان: <?php echo htmlspecialchars($book['title'])?> </div>
         <div> نویسنده:<?php echo htmlspecialchars($book['author'])?> </div>
         <hr class="line_2">
         <div class="more_information">
            <a class="link_information" href="more_info.php?id=<?php echo $book['id']?>"> اطلاعات بیشتر و تکمیل سفارش</a>
         </div>
      </div>
      <?php endforeach;?>
   </div>


</div>



<?php require('footer.php'); ?>

</html>