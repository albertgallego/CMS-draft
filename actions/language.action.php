<?php
//echo "buh?";
   /**/ session_start();
    $_SESSION['currLang']=$_GET['newLang'];
//die();
    /*TODO: AJax*/
    header("location:/page/".$_SESSION['currLang']."/".$_GET['refereer']);
?>
