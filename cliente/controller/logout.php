<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 05/05/2019
 * Time: 04:36 AM
 */
session_start();
session_destroy();
header("Location: ../contents/login.php");