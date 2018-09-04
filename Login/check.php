<?php
    session_start();

    if ($_POST["uname"]=="admin" && $_POST["psw"]=="admin"){
        $_SESSION["userName"]="admin";
        header('Location: newBlog/home.php');
        exit();

    }else{
        header('Location: login.html');
        exit();
    }
?>