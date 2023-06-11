<?php
$connected=mysqli_connect('localhost','user','test1234','korosh book');

if(!$connected){
    echo  "error:".mysqli_connect_error();
}