<?php
$connected=mysqli_connect('localhost','-','-','korosh book');

if(!$connected){
    echo  "error:".mysqli_connect_error();
}