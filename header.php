<?php
session_start();

$name=$_SESSION['name']??" ";




?>

<head>
    <meta charset= UTF-8>
    <title>کتاب  کوروش</title>
    <link rel="stylesheet" href="css/style project_index.css">
    <link rel="stylesheet" href="css/style project_head.css">
     <link rel="stylesheet" href="css/style project_end.css">
     <link rel="stylesheet" href="css/style project_add.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body >
<header>
<div class="header">
    <div class="new-book">

        <button class="button_style1">
            <a  class= "order" href="add book.php"> سفارش کتاب جدید </a>
        </button>

    </div>

    <div class="link1">
        <div dir=rtl class="return_name">خوش امدید&nbsp;&nbsp;<?php echo htmlspecialchars($name)?></div>
        <a class="link_name" href="index.php">کتاب کوروش</a>


    </div>


</div>
</header>
