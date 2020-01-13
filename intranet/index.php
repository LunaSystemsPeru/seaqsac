<?php
session_start();


if (isset($_SESSION['id_usuario'])) {
    header("Location: contents/index.php");
    }else{
        header ("Location: login.php");
    }


