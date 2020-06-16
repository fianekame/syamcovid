<?php
    session_start();
    $data = explode('-',$_POST['selectedstore'],2);
    $_SESSION['selectedstore'] = $data[0];
    $_SESSION['storename'] = $data[1];
?>
