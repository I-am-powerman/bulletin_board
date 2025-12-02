<?php
if(!empty($_POST['new_user'])){
    $new_user   = $_POST['new_user'];
    $queryNew  = "INSERT INTO users (slug, users) VALUES ('$new_user', '$new_user')"; 

    $res = queryDB($connect, $queryNew);
    
    header('Location:all');
}