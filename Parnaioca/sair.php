<?php
    
    session_start();
    session_destroy();
    
    $msg = "Logout efetuado!";
    header("location:/Parnaioca/index.php?msg=".$msg);
