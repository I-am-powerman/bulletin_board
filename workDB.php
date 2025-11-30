<?php
function connectDB($host, $port,
         $dbname, $user,
         $password){
    return pg_connect("host=$host
        port=$port
        dbname=$dbname
        user=$user
        password=$password");
}
function queryDB($connect, $sql_query){
    $res = pg_query($connect, $sql_query);
    if (!$res){
        $error = pg_last_error($connect);
        echo ('Database error: ' . $error . '<br>');
    }
    return $res ;
}
?>